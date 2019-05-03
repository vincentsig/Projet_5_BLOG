<?php

namespace App\Table;

use Core\Table\Table;

class UserTable extends Table
{
    public function findWithUser($id)
    {
        return $this->query(
            "SELECT user.id, user.username
        FROM {$this->table}
        LEFT JOIN blogpost ON user.id = blogpost.user_id
        WHERE blogpost.id = ?",
            [$id],
            true
        );
    }

}
