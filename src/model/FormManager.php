<?php 

class FormManager 
{

   

    public $tag = 'p';


    /**
     * surround
     *
     * @param  mixed $html surround the html code with a default tag <p> 
     *
     * @return string
     */
    private function surround($html)
    {
       return "<{$this->tag}>{$html}</{$this->tag}>";
    }


  

    /**
     * input
     * create a input form with two arguments :
     * @param  mixed $name
     * @param  mixed $placeholder
     *
     * @return string
     */
    public function input($name,$placeholder)
    {
        return $this->surround('<input type="text" name="' . $name . '" . placeholder="' . $placeholder . '">');
    }

    public function submit()
    {
        return $this->surround('<button type="submmit">Envoyer</button>');
    }

}