<?php


namespace Cbatista8a\Formbuilder\Classes;


class Attribute
{
    private string $name;
    /**
     * @var mixed
     */
    private $value;

    public function __construct($name, $value = null)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return "{$this->name}=\"{$this->value}\"";
    }
}