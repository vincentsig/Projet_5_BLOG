<?php

namespace App\Table;

use Core\Table\Table;

class CategoryTable extends Table
{
    public function deleteCat($id)
    {
        return $this->query("DELETE FROM {$this->table}  WHERE id= ?", [$id], true);
    }
}
