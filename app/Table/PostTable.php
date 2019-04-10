<?php

namespace App\Table;

use Core\Table\Table;

class PostTable extends Table
{
      
    protected $table="blogpost";


    public function last()
    {
        return $this->query(
            "SELECT blogpost.id, blogpost.title, blogpost.lead_in, blogpost.content,
                blogpost.date_created, category.title as category
        FROM blogpost
        LEFT JOIN category ON category_id = category.id
        ORDER BY blogpost.date_created DESC
        ");
    }


    /**
     * last
     * get the last 4 blogposts
     * @return array
     */
    public function lastFourPosts()
    {
        return $this->query(
            "SELECT blogpost.id, blogpost.title, blogpost.lead_in, blogpost.content,
                blogpost.date_created, blogpost.last_update, category.title as category, user.username as username, user.id as id_user 
        FROM blogpost
        LEFT JOIN user ON blogpost.user_id = user.id
        LEFT JOIN category ON category_id = category.id
        ORDER BY blogpost.date_created DESC
        LIMIT 4");
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
            "SELECT blogpost.id, blogpost.title, blogpost.lead_in, blogpost.content,
            blogpost.date_created as date_created, category.title as category, user.username as username , user.id as id_user
        FROM blogpost
        LEFT JOIN user ON blogpost.user_id = user.id
        LEFT JOIN category ON category_id = category.id
        WHERE blogpost.id = ?", [$id], true);
    }

    public function lastByCategory($category_id)
    {
        return $this->query(
            "SELECT blogpost.id, blogpost.title, blogpost.content, category.title as category
            FROM blogpost
            LEFT JOIN category ON category_id = category.id
            WHERE blogpost.category_id = ? 
            ORDER BY blogpost.date_created DESC" ,[$category_id]);
    }


     



}