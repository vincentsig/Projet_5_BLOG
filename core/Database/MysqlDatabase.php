<?php

namespace Core\Database;

use \PDO;

class MysqlDatabase extends Database
{
    private $db_name;
    private $db_host;
    private $db_user;
    private $db_pass;
    private $pdo;
    



    public function __construct($db_name, $db_host='localhost', $db_user='root', $db_pass='')
    {
        $this->db_name = $db_name;
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
    }


    public function getPDO()
    {
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:dbname=' . "$this->db_name" . ';' . "$this->db_host", "$this->db_user", "$this->db_pass");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }


    /**
     * query
     *
     * @param  mixed $statement (sql)
     * @param  mixed $class_name
     * @param  mixed $one is true if there is just one result to get (fetch()).
     * This request check the type (UPDATE, INSERT or DELETE) in this case the request is directly excuted
     * If it's an other type, return an Object or a Class depending of the $class_name
     * @return void
     */
    public function query($statement, $class_name = null, $one = false)
    {
        $req = $this->getPDO()->query($statement);
        if (
            strpos($statement, 'UPDATE')=== 0 ||
            strpos($statement, 'INSERT')=== 0 ||
            strpos($statement, 'DELETE')=== 0) {
            return $req;
        }
        
        if ($class_name === null) {
            $req->setFetchmode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    public function prepare($statement, $attributes, $class_name = null, $one = false)
    {
        $req= $this->getPDO()->prepare($statement);
        $res = $req->execute($attributes);
        if (
            strpos($statement, 'UPDATE')=== 0 ||
            strpos($statement, 'INSERT')=== 0 ||
            strpos($statement, 'DELETE')=== 0) {
            return $res;
        }
        
       
        if ($class_name === null) {
            $req->setFetchmode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    public function lastInsertID()
    {
        return $this->getPDO()->lastInsertId();
    }
}
