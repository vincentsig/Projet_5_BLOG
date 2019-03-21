<?php

namespace Core\HTML;

class BootstrapForm extends Form {


    protected function surround($html)
    {
        return "<div class=\"form-group\">{$html}</div>";
    }


    /**
     * input
     *
     * @param  mixed $name
     * @param  mixed $label
     * @param  mixed $options
     *
     * @return string
     */
    public function input($name, $label, $options=[])
    {
        $type = isset($options['type']) ? $options['type'] : 'texte';
        $label ='<label>' . $label . '</label>'; 
        if($type ==='textarea')
        {
            $input ='<textarea name="' .  
            $name . '" class="form-control">' . 
            $this->getValue($name) . '</textarea>'; 

        }
        else
        {
            $input ='<input type="' . 
            $type .'" name="' . 
            $name . '" value="' . 
            $this->getValue($name) . '">'; 
        }
        return  $this->surround($label . $input);
    }

}

