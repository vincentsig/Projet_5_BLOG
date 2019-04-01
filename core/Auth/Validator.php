<?php
use Core\Database\Database;

namespace Core\Auth;

class Validator 
{

    
    private $data;
    private $errors = [];


    /**
     * __construct
     *
     * @param  mixed $data ($_POST) from the form
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;  
    }

    /**
     * getField
     *
     * @param  mixed $field
     * verifie que $field est bien dans la variable $data passé en POST
     * @return void
     */
    private function getField($field)
    {
        if(!isset($this->data[$field]))
        {
            return null;
        }
        return $this->data[$field];
    }
    /**
     * alphanumriq
     *
     * @param  mixed $field champs à valider
     * @param  mixed $errorMsg message erreur
     * check if the fields is alphanumriq ( "_" is also accepted)
     * @return array
     */
    public function isAlpha($field, $errorMsg)
    {
        if(!preg_match('/^[a-zA-Z0-9_]+$/', $this->getField($field)))
        {
            $this->errors[$field] = $errorMsg;
        }
    
    
    }

    /**
     * isUniq
     *
     * @param  mixed 
     * @param  mixed $table
     * @param  mixed $errorMsg
     * verifie q'un champ n'est pas déja utilisé en BDD
     * @return void
     */
    public function isUniq($field, $db,  $table, $errorMsg)
    {
        
        $record = $db->prepare("SELECT id FROM $table WHERE $field = ?",[$this->getField($field)], null, true);
        if ($record) {
            $this->errors[$field] = $errorMsg;
            return false;
        }
        return true;
    }


    public function isEmail($field, $errorMsg)
    {
        if (!filter_var($this->getField($field), FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = $errorMsg;
            return false;
        }
        return true;
    }




    /**
     * isConfirmed
     *
     * @param  mixed $field
     * @param  mixed $errorMsg
     * check if the value in field matching the confirmation field
     * @return void
     */
    public function isConfirmed($field, $errorMsg)
    {
        $value = $this->getField($field);
        if(empty($value) || $value != $this->getField($field . '_confirm'))
        {
            $this->errors[$field] = $errorMsg;
        }
    }

    
    /**
     * isValid
     * check if the regestration is valid
     * @return void
     */
    public function isValid()
    {
        return empty($this->errors);
    }


    /**
     * getErrors
     * get the errors in an array
     * @return void
     */
    public function getErrors()
    {
        return $this->errors;
    }



}