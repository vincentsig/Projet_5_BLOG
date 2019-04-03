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

    public function findWithComment($id)
    {
        return $this->query(
            "SELECT comment.id, comment.content, user.username FROM {$this->table} 
        LEFT JOIN blogpost ON blogpost_id = blogpost.id
        LEFT JOIN user ON user_id = user.id
        WHERE blogpost_id = ?", [$id]);
    }

}