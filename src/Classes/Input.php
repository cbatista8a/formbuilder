<?php
namespace Cbatista8a\Formbuilder\Classes;

use Cbatista8a\Formbuilder\Interfaces\HtmlElement;

class Input extends Field implements HtmlElement
{

    private string $type;

    public function __construct(string $type, string $name, string $id, bool $required, $value = null, string $classes = 'form-input')
    {
        parent::__construct( $name, $id, $required, $value, $classes);
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    public function render() :string
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