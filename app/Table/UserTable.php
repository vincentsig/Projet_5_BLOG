<?php

namespace App\Table;

use Core\Table\Table;

class UserTable extends Table
{
   

    public function getRole($id)
    {
        return $this->query('UPDATE ON 
        FROM user
        WHERE id = ?', [$id]);
    }

   


}