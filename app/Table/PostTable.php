<?php

namespace App\Table;

use Core\Table\Table;

class PostTable extends Table
{
    /**
     * last
     * get the last blogposts
     * @return array
     */
    public function last()
    {
        return $this->query(
            "SELECT blogpost.id, blogpost.title, blogpost.content, category.title as category
        FROM blogpost
        LEFT JOIN category ON category_id = category.id
        ORDER BY blogpost.date_created DESC");
    }

    public function find($id)
    {
        return $this->query(
            "SELECT blogpost.id, blogpost.title, blogpost.content, category.title as category
        FROM blogpost
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