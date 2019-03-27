<?php

namespace App\Table;

use Core\Table\Table;

class CommentTable extends Table
{
   
    public function addComment($id)
    {

    }

    public function count($id)
    {
        return $this->query(
            "SELECT COUNT(comment.content) FROM {$this->table} 
            WHERE comment.blogpost_id= ? AND comment.status IS NOT NULL", [$id], true);
    }

    
}