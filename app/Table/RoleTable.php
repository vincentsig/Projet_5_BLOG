<?php

namespace App\Table;

use Core\Table\Table;

class RoleTable extends Table
{
   

    public function getRole($id)
    {
        return $this->query(
            "SELECT role.id, role.name, user.role_id
            FROM role 
            LEFT JOIN user ON user.role_id = role.id
            WHERE urer.role_id = role.id", [$id]);
    }
   


}