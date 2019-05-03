<?php
namespace Core\Auth;

use App;
use Core\Database\MysqlDatabase;
use Core\Auth\StrToken;

class Auth
{
    protected $db;
    private $my_email;
    private $local_url;
    private $session;
    private $options = [
        'restriction_msg' => "Vous n'avez pas le droit d'accéder à cette page"
    ];
    

    public function __construct(MysqlDatabase $db, $session, $options = [])
    {
        $this->options = array_merge($this->options, $options);
        $this->session = $session;
        $this->db =$db;
        $this->my_email= App::getInstance()->getEmail();
        $this->local_url= App::getInstance()->getLocalUrl();
    }
   
    
    /**
     * hashPassword
     * check if there is a password
     * @param  mixed $password
     *
     * @return void
     */
    public function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    
    
    /**
     * register
     * register a new user in the db
     * @param  mixed $db
     * @param  mixed $username
     * @param  mixed $password
     * @param  mixed $email
     *
     * @return void
     */
    public function register($db, $username, $password, $email)
    {
        $password = $this->hashPassword($password);
        $token = StrToken::random(60);
        $db->prepare("INSERT INTO user SET role_id = 2 ,username = ?, password = ?, email = ?, confirmation_token = ?", [
            $username,
            $password,
            $email,
            $token
        ]);
        $user_id = $db->lastInsertId();
      
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: "' . $this->my_email . "\r\n";
        mail(
            $email,
            'Confirmation de votre compte',
            "Afin de valider votre compte merci de cliquer sur ce lien\n\n{$this->local_url}public/index.php?page=users.confirm&id=$user_id&token=$token",
            $headers
        );
    }



    /**
     * confirm
     * confirmation of the token sent by email
     * @param  mixed $db
     * @param  mixed $user_id
     * @param  mixed $token
     *
     * @return void
     */
    public function confirm($db, $user_id, $token)
    {
        $user = $db->prepare('SELECT * FROM user WHERE id = ?', [$user_id], null, true);
        if ($user && $user->confirmation_token == $token) {
            $db->prepare('UPDATE user SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?', [$user_id]);
            $this->session->write('auth', $user);
            return true;
        }
        return false;
    }


    /**
     * connect
     * connect the user
     * @param  mixed $user
     *
     * @return void
     */
    public function connect($user)
    {
        $this->session->write('auth', $user);
    }

    public function logout()
    {
        $this->session->delete('auth');
    }

    /**
     * login
     *
     * @param  mixed $db
     * @param  mixed $username
     * @param  mixed $password
     *
     * @return array
     */
    public function login($db, $username, $password)
    {
        $user = $db->prepare('SELECT * FROM user WHERE username = ? AND confirmed_at IS NOT NULL', [$username], null, true);
        if (password_verify($password, $user->password)) {
            $this->connect($user);
            return $user;
        } else {
            return false;
        }
    }

    /**
     * restrict
     * restrict access if it's a different session
     * @return void
     */
    public function restrict()
    {
        if (!$this->session->read('auth')) {
            $this->session->setFlash('danger', $this->options['restriction_msg']);
            return App::redirect('index.php?page=users.login');
            ;
        }
    }

    /**
     * update_password
     * Update your password account
     * @param  mixed $db
     * @param  mixed $password
     * @param  mixed $user_id
     *
     * @return void
     */
    public function update_password($db, $password, $user_id)
    {
        $db->prepare('UPDATE user SET password = ? WHERE id = ?', [$password, $user_id]);
    }
    

    /**
     * resetPassword
     * Reset your password account if forget
     * @param  mixed $db
     * @param  mixed $email
     *
     * @return void
     */
    public function resetPassword($db, $email){
        $user = $db->prepare('SELECT * FROM user WHERE email = ? AND confirmed_at IS NOT NULL', [$email], null, true);
        if($user){
            $reset_token = StrToken::random(60);
            $db->prepare('UPDATE user SET reset_token = ?, reset_at = NOW() WHERE id = ?', [$reset_token, $user->id]);

            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: "' . $this->my_email . "\r\n";
            mail($_POST['email'], 'Réinitiatilisation de votre mot de passe', 
            "Afin de réinitialiser votre mot de passe merci de cliquer sur ce lien\n\n{$this->local_url}public/index.php?page=users.reset&id=$user->id&token=$reset_token");
            return $user;
        }
        return false;
    }


    /**
     * checkResetToken
     *
     * @param  mixed $db
     * @param  mixed $user_id
     * @param  mixed $token
     *  check if there is a reset token, the time limit to validate the token is 30 minutes, 
     * after that it will expire. 
     * @return void
     */
    public function checkResetToken($db, $user_id, $token){
        return $db->prepare('SELECT * FROM user WHERE id = ? AND reset_token IS NOT NULL AND reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)', [$user_id, $token], null, true);
    }




    public function logged()
    {
        return isset($_SESSION['auth']);
    }

    /**
     * getUserId
     * get the user id (use in the managment users)
     * @return void
     */
    public function getUserId()
    {
        if ($this->logged()) {
            $session_id = $_SESSION['auth']->id;
            return $session_id;
        }
    }


    /**
     * getRole
     * get the role id for the managment acces
     * @return void
     */
    public function getRole()
    {
        if ($this->logged()) {
            $role = $_SESSION['auth']->role_id;
            return $role;
        }
    }
}
