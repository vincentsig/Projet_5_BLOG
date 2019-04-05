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
            WHERE comment.blogpost_id = ? AND comment.status IS NOT NULL", [$id], true);
    }

    public function findWithComment($id)
    {
        return $this->query(
            "SELECT comment.id, comment.content, comment.status, user.username, user.id FROM {$this->table} 
        LEFT JOIN blogpost ON blogpost_id = blogpost.id
        LEFT JOIN user ON comment.user_id = user.id
        WHERE  comment.status IS NOT NULL AND blogpost_id = ?", [$id]) ;
    }

    public function validatedComment($id, $user_id)
    {
        return $this->query(
            "SELECT comment.id, comment.content, comment.status, user.username, user.id FROM {$this->table} 
        LEFT JOIN blogpost ON blogpost_id = blogpost.id
        LEFT JOIN user ON comment.user_id = user.id
        WHERE  comment.status IS NULL blogpost_id = ?", [$id]) ;
    }

}