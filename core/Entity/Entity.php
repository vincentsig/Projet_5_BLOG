<?php

namespace Core\Entity;

class Entity
{
    /**
     * __get
     * magic function
     * guess the name of the method and return the method
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
