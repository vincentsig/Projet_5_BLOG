<?php
namespace Core\Auth;

use Core\Database\MysqlDatabase;
use Core\Auth\StrToken;

class Auth 
{
    protected $db;

    public function __construct(MysqlDatabase $db)
    {        
        $this->db =$db;
    }
    
    
    public function hashPassword($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function getUserId()
    {
        if ($this->logged())
        {
            return $_SESSION['auth'];
        }
        return false;
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


  

    public function logged()
    {
        return isset($_SESSION['auth']);
    }



}