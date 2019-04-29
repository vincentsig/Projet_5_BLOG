<?php

namespace Core\HTML;

class Form
{
    protected $data;

    public $value;
    public $surround = 'p';

    public function __construct($data = array())
    {
        $this->data = $data;
    }

    protected function surround($html)
    {
        return "<{$this->surround}>$html</{$this->surround}>";
    }


    protected function getValue($index)
    {
        if (is_object($this->data)) {
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
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
        $type =isset($options['type']) ? $options['type'] : 'text';
        return  $this->surround(
            '<input type="' . $type . '" name="' . htmlspecialchars($name) . '
    " value="' . $this->getValue($name) . '">'
    );
    }

    public function submit()
    {
        return $this->surround('<button type="submit">Evoyer</button>');
    }
}
