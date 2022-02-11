<?php


namespace Cbatista8a\Formbuilder\Classes;


use Cbatista8a\Formbuilder\Interfaces\HtmlElement;

class Button implements HtmlElement
{

    private string $type;
    private string $name;
    private string $id;
    /**
     * @var string
     */
    private string $label;
    private string $classes;

    public function __construct(string $type, string $name, string $id, $label = 'Submit', string $classes = 'form-button')
    {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->label = $label;
        $this->classes = $classes;
    }

    public function render(): string
    {
        return "<button
                    type='{$this->type}'
                    name='{$this->name}'
                    id='{$this->id}'
                    class='{$this->classes}'>{$this->label}</button>
                ";
    }
}