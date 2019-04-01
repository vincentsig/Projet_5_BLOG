<?php
namespace Core\Auth;

use Core\Database\MysqlDatabase;


class DBAuth
{
    public $db;

    public function __construct(MysqlDatabase $db)
    {
        
        $this->db =$db;
    }
    

    /**
     * login
     *
     * @param  mixed $username
     * @param  mixed $password
     *
     * @return boolean
     */
    public function login($username, $password)
    {
        $user = $this->db->prepare('SELECT * FROM user WHERE username = ?',[$username], null , true);
        if($user)
        {
             if($user->password === $password)
             {
                 $_SESSION['auth'] = $user->id;
                 return true;
             }
        }
         return false;
    }
// ajouter une methode d'encryptage type password_hash

    public function logged()
    {
        return isset($_SESSION['auth']);
    }

    
    public function getUserId()
    {
        if ($this->logged())
        {
            return $_SESSION['auth'];
        }
        return false;
    }


}