<?php
namespace Core\Auth;

use App;
use Core\Database\MysqlDatabase;
use Core\Auth\StrToken;

class Auth
{
    protected $db;
    private $my_email;
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
            "Afin de valider votre compte merci de cliquer sur 
         ce lien\n\nhttp://localhost/Projet_5/public/index.php?page=users.confirm&id=$user_id&token=$token",
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


    public function connect($user)
    {
        $this->session->write('auth', $user);
    }

    public function logout()
    {
        $this->session->delete('auth');
    }

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

    public function restrict()
    {
        if (!$this->session->read('auth')) {
            $this->session->setFlash('danger', $this->options['restriction_msg']);
            header('Location: index.php?page=users.login');
            exit();
        }
    }

    public function update_password($db, $password, $user_id)
    {
        $db->prepare('UPDATE user SET password = ? WHERE id = ?', [$password, $user_id]);
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
        if ($this->logged()){
        $role = $_SESSION['auth']->role_id;
        return $role;
        }
    }
}
