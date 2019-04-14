<?php

namespace Core\Auth;

class StrToken
{
    /**
     * random
     * generate a token for the email validation
     * @param  mixed $length
     *
     * @return void
     */
    public static function random($length)
    {
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }
}
