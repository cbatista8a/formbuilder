<?php
namespace Cbatista8a\Formbuilder\Model;

class Field
{

    private string $type;
    private string $name;
    private string $id;
    private string $required;
    private string $classes;
    /**
     * @var mixed
     */
    private $value;

    public function __construct(string $type,string $name, string $id, bool $required,$value = null,string $classes = 'form-input')
    {
        $this->type = $type;
        $this->name = $name;
        $this->value = $value ?? '';
        $this->id = $id;
        $this->required = $required ? 'required' : '';
        $this->classes = $classes;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
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

    public function render()
    {
        return "
                <input type='{$this->type}'
                        name='{$this->name}'
                        id='{$this->id}'
                        class='{$this->classes}'
                        value='{$this->value}'
                        {$this->required}
                >
        ";
    }
}