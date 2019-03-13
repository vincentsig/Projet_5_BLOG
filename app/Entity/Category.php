<?php

namespace App\Entity; 

use App\App;

class category{

    private static $entity = 'category';

    

    /**
     * getCategories
     * get all the categories
     * @return void
     */
    public static function getCategories()
    {
        return App::getDb()->query(
            "SELECT *
            FROM " . self::$entity . " 
            ", __CLASS__);
    }


    /**
     * getURL
     * get the URL with the id for the category page
     * @return void
     */
    public function getURL()
    {
        return 'index.php?p=category&id=' . $this->id;
    }

}