<?php

namespace App\Entity;                      

use App\App;

class Post
{
    /**
     * getLast
     * get all the posts with the category associated
     * @return void
     */
    public static function getLast()
    {
        return App::getDb()->query(
        "SELECT blogpost.id, blogpost.title, blogpost.content, category.title as category
        FROM blogpost
        LEFT JOIN category ON category_id = category.id", __CLASS__);
    }

    /**
     * getURL
     * get the URL for the single post associated by the id
     * @return void
     */
    public function getURL()
    {
        return 'index.php?p=singlePost&id=' . $this->id;
    }

    /**
     * getExcerpt
     * get an excerpt of the post with 200 characters
     * @return void
     */
    public function getExcerpt()
    {
        $html = '<p>' . substr($this->content,0 , 200) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }





}