<?php 

namespace App;

class App 
{
    const DB_NAME = 'blog';
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = '';
    
    private static $database;
    private static $title = 'My portefolio';

    /**
     * getDb checking the connection to the database 
     *  if not connected start connection
     * @return void
     */
    public static function getDb()
    {
        if(self::$database === null)
        {
            self::$database = new Database(self::DB_NAME, self::DB_HOST, self::DB_USER, self::DB_PASS);
        }
        return self::$database;
    }

    
    /**
     * getTitle
     * get the title for the <head>
     *  'My portoflio' per default in private static $title
     * @return void
     */
    public static function getTitle()
    {
        return self::$title;
    }


    /**
     * setTitle
     *
     * @param  mixed $title
     *
     * @return void
     */
    public static function setTitle($title)
    {
        self::$title = $title;
    }


}