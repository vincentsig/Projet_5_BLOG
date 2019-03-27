<?php
namespace Core\Auth;

use Core\Database\MysqlDatabase;


class Auth 
{
    protected $db;

        public function __construct(MysqlDatabase $db)
        {
            $this->db =$db;
        }
    


    public function register($username, $password, $email)
    {
        $password = $this->hashPassword($password);
        $token = StrToken::random(60);
        $this->db->query("INSERT INTO users SET username = ?, password = ?, email = ?, confirmation_token = ?", [
            $username,
            $password,
            $email,
            $token
        ]);
        $user_id = $this->db->lastInsertId();
        mail($email, 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://local.dev/Lab/Comptes/confirm.php?id=$user_id&token=$token"); 
    }



}