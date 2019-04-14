<?php
 use Core\Config;
 use Core\Database\MysqlDatabase;
 use Core\Auth\Auth;
 use Core\Auth\Session;
 use Core\Auth\Contact;
class App 
{
    
    public $title = 'My portefolio';
    
    private static $_instance;
    private $db_instance;
    private $my_email;

    public static function getInstance()
    {
        if(is_null(self::$_instance))
        {
            self::$_instance = new App();
        }

        return self::$_instance;
    }

    /**
     * load
     * load the controller with the autoloader 
     * @return void
     */
    public static function load()
    {
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }

    /**
     * getTable
     *initialize object corresponding to the table ($name) from the DBB
     * @param  mixed $name
     *
     * @return void
     */
    public function getTable($name)
    {
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

    public function getDb()
    {
        $config = Config::getInstance(ROOT . '/config/config.php');

        if (is_null($this->db_instance))
        {
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_host'), $config->get('db_user'),$config->get('db_pass'));
        }
        return $this->db_instance;
    }

    /**
     * getAuth
     *
     * @return void
     */
    static function getAuth()
    {
        return new Auth(App::getInstance()->getDb(),Session::getInstance(), ['restriction_msg' => 'Désole votre compte à été bloqué']);
    }


    /**
     * redirect
     * redirect from path $page
     * @param  mixed $page
     *
     * @return void
     */
    static function redirect($page){
        header("Location: $page");
        exit();
    }


    /**
     * getEmail
     * get the email in the config file
     * @return void
     */
    public function getEmail()
    {
        $config = Config::getInstance(ROOT . '/config/config.php');

        if (is_null($this->my_email))
        {
            $this->my_email = new Contact($config->get('my_email'));
        }
        return $this->my_email;

    }
}
