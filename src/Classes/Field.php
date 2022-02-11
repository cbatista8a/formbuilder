<?php


namespace Cbatista8a\Formbuilder\Classes;


class Field
{
    protected string $name;
    protected string $id;
    protected string $required;
    protected string $classes;
    /**
     * @var mixed
     */
    protected $value;

    public function __construct(string $name, string $id, bool $required, $value = null, string $classes = 'form-input')
    {
        $this->name = $name;
        $this->value = $value ?? '';
        $this->id = $id;
        $this->required = $required ? 'required' : '';
        $this->classes = $classes;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function isRequired(): string
    {
        return $this->required;
    }

    /**
     * @return string
     */
    public function getClasses() : string
    {
        return $this->classes;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

}