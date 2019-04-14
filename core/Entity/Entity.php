<?php

namespace Core\Entity;

class Entity
{
    /**
     * __get
     * get the attributes in the table
     * @param  mixed $key
     *
     * @return void
     */
    public function __get($key)
    {
        $method ='get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}
