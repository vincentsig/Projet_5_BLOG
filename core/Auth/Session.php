<?php

namespace Core\Auth;
Class Session
{

    static $instance;

    /**
     * getInstance
     * singleton 
     * @return void
     */
    static function getInstance(){
        if(!self::$instance){
            self::$instance = new Session();
        }
        return self::$instance;
    }

    public function __construct(){
        session_start();
    }

    /**
     * setFlash
     *
     * @param  mixed $key
     * @param  mixed $message
     * save a flash message in the Session 'flash'
     * @return void
     */
    public function setFlash($key, $message){
        $_SESSION['flash'][$key] = $message;
    }

    /**
     * hasFlashes
     * check if there are some flashes messages in ($_SESSION['flash'])
     */
    public function hasFlashes(){
        return isset($_SESSION['flash']);
    }

    /**
     * getFlashes
     * get all the flashes message and unset them
     * @return void
     */
    public function getFlashes(){
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }

    /**
     * write
     *
     * @param  mixed $key
     * @param  mixed $value
     * insert $value on $_SESSION[$key]
     * @return void
     */
    public function write($key, $value){
        $_SESSION[$key] = $value;
    }

    /**
     * read
     * check if it's the same session
     * @param  mixed $key
     *
     * @return void
     */
    public function read($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function delete($key){
        unset($_SESSION[$key]);
    }

}