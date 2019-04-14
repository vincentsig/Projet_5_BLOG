<?php

namespace App\Table;

use Core\Table\Table;

class CommentTable extends Table
{
    public function count($id)
    {
        return $this->query(
            "SELECT COUNT(comment.content) FROM {$this->table} 
            WHERE comment.blogpost_id = ? AND comment.status IS NOT NULL",
            [$id],
            true
        );
    }

    public function findWithComment($id)
    {
        return $this->query(
            "SELECT comment.id, comment.content, DATE_FORMAT(comment.status, '%d/%m/%Y %H:%i:%s') as date_published  , user.username, user.id 
            FROM {$this->table} 
            LEFT JOIN blogpost ON blogpost_id = blogpost.id
            LEFT JOIN user ON comment.user_id = user.id
            WHERE  comment.status IS NOT NULL AND blogpost_id = ?",
            [$id]
        ) ;
    }



    /**
     * waitingValidation
     * show the comment waiting to be validated by the user who post it.
     * @param  mixed $user_id
     * @param  mixed $id
     *
     * @return void
     */
    public function waitingValidation($user_id, $id)
    {
        return $this->query(
            "SELECT comment.id, comment.content, comment.status, comment.user_id, comment.blogpost_id, user.username, user.id  FROM {$this->table}
        LEFT JOIN blogpost ON comment.blogpost_id = blogpost.id
        LEFT JOIN user ON comment.user_id = user.id 
        WHERE comment.user_id = ? AND comment.blogpost_id = ? AND comment.status IS NULL",
            [$user_id, $id]
        );
    }

    /**
     * waitingList
     * show the comments not validated
     * @return void
     */
    public function waitingList()
    {
        return $this->query(
            "SELECT comment.id as comment_id, comment.content, comment.status, comment.user_id, user.username, user.id
         FROM comment
        LEFT JOIN user ON comment.user_id = user.id 
        WHERE comment.status IS NULL"
        );
    }

   
}
