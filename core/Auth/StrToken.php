<?php

namespace Core\Auth;

use Core\Database\MysqlDatabase;

class StrToken
{
    static function random($length)
    {  
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }
}