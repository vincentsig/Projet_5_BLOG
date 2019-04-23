<?php

namespace App\Table;

use Core\Table\Table;

class PostTable extends Table
{
    protected $table="blogpost";


    public function last()
    {
        return $this->query(
            "SELECT blogpost.id, blogpost.title, blogpost.lead_in, blogpost.content,  blogpost.archive, blogpost.image,
            DATE_FORMAT(blogpost.date_created, '%d/%m/%Y %H:%i:%s') as date_created ,
            DATE_FORMAT(blogpost.last_update, '%d/%m/%Y %H:%i:%s') as last_update, category.title as category, user.username as username, user.id as id_user 
        FROM blogpost
        LEFT JOIN user ON blogpost.user_id = user.id
        LEFT JOIN category ON category_id = category.id
        WHERE  blogpost.archive IS NULL
        ORDER BY date_created DESC
        "
        );
    }


    /**
     * last
     * get the last 4 blogposts
     * @return array
     */
    public function lastFourPosts()
    {
        return $this->query(
            "SELECT blogpost.id, blogpost.title, blogpost.lead_in, blogpost.content,  blogpost.archive,
                 DATE_FORMAT(blogpost.date_created, '%d/%m/%Y %H:%i:%s') as date_created ,
                 DATE_FORMAT(blogpost.last_update, '%d/%m/%Y %H:%i:%s') as last_update, category.title as category, user.username as username, user.id as id_user 
        FROM blogpost
        LEFT JOIN user ON blogpost.user_id = user.id
        LEFT JOIN category ON category_id = category.id
        WHERE  blogpost.archive IS NULL
        ORDER BY date_created DESC
        LIMIT 2"
        );
    }

    /**
     * find
     * Find a post and his category with the post ID
     * @param  mixed $id
     *
     * @return void
     */
    public function findWithCategory($id)
    {
        return $this->query(
            "SELECT blogpost.id, blogpost.title, blogpost.lead_in, blogpost.content,blogpost.archive, blogpost.image,
            blogpost.date_created as date_created, category.title as category, user.username as username , user.id as id_user
        FROM blogpost
        LEFT JOIN user ON blogpost.user_id = user.id
        LEFT JOIN category ON category_id = category.id
        WHERE blogpost.id = ? AND blogpost.archive IS NULL",
            [$id],
            true
        );
    }

    public function lastByCategory($category_id)
    {
        return $this->query(
            "SELECT blogpost.id, blogpost.title, blogpost.content, blogpost.archive, category.title as category
            FROM blogpost
            LEFT JOIN category ON category_id = category.id
            WHERE blogpost.category_id = ? AND blogpost.archive IS NULL
            ORDER BY blogpost.date_created DESC",
            [$category_id]
        );
    }

    public function allPosts()
    {
        return $this->query(
        "SELECT * 
        FROM blogpost
        WHERE blogpost.archive IS NULL");
    }
  
    public function archived()
    {
        return $this->query(
        "SELECT * 
        FROM blogpost
        WHERE blogpost.archive IS NOT NULL");
    }



}
