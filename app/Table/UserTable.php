<?php

namespace App\Table;

use Core\Table\Table;

class UserTable extends Table
{


    public function registerUser($username, $password, $email)
    {
        return $this->query("INSERT INTO user SET username = ?, password = ?, email = ? ", [$username , $password, $email]);
            
    }
    

}





