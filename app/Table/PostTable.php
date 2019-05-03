<?php

namespace App\Table;

use Core\Table\Table;

class PostTable extends Table
{
    protected $table="blogpost";


    public function last()
    {
        return $this->query(
            "SELECT blogpost.id, blogpost.title, blogpost.lead_in, blogpost.content,  blogpost.archive,
            DATE_FORMAT(blogpost.date_created, '%d/%m/%Y %H:%i:%s') as date_created ,
            DATE_FORMAT(blogpost.last_update, '%d/%m/%Y %H:%i:%s') as last_update, category.title as category, user.username as username, user.id as id_user 
        FROM blogpost
        LEFT JOIN user ON blogpost.user_id = user.id
        LEFT JOIN category ON category_id = category.id
        WHERE  blogpost.archive IS NULL
        ORDER BY date_created ASC
        "
        );
    }


    /**
     * last
     * get the last 2 blogposts
     * @return array
     */
    public function lastTwoPosts()
    {
        return $this->query(
            "SELECT blogpost.id, blogpost.title, blogpost.lead_in, blogpost.content, blogpost.archive, image.tag as tag, image.image_dir,
                 DATE_FORMAT(blogpost.date_created, '%d/%m/%Y %H:%i:%s') as date_created ,
                 DATE_FORMAT(blogpost.last_update, '%d/%m/%Y %H:%i:%s') as last_update, category.title as category, user.username as username, user.id as id_user 
        FROM blogpost
        LEFT JOIN user ON blogpost.user_id = user.id
        LEFT JOIN category ON category_id = category.id
        LEFT JOIN image ON blogpost.id = image.blogpost_id
        WHERE  blogpost.archive IS NULL AND tag='logo'
        ORDER BY date_created ASC
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
            "SELECT blogpost.id, blogpost.title, blogpost.lead_in, blogpost.content, blogpost.archive, blogpost.extern_link,  image.tag as tag, image.image_dir,
            blogpost.date_created as date_created, category.title as category, user.username as username , user.id as id_user
        FROM blogpost
        LEFT JOIN user ON blogpost.user_id = user.id
        LEFT JOIN category ON category_id = category.id
        LEFT JOIN image ON blogpost.id = image.blogpost_id
        WHERE blogpost.id = ? AND blogpost.archive IS NULL  AND tag='preview'",
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
        WHERE blogpost.archive IS NULL"
        );
    }
  
    public function archived()
    {
        return $this->query(
            "SELECT * 
        FROM blogpost
        WHERE blogpost.archive IS NOT NULL"
        );
    }
}
