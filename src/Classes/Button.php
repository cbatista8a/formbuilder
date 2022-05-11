<?php


namespace Cbatista8a\Formbuilder\Classes;

class Button extends Element
{

    private string $type;
    private string $label;

    public function __construct(string $type, string $label)
    {
        $this->type = $type;
        $this->label = $label;
    }

    public function render(): string
    {
        return "<button
                    type='{$this->type}'
                    {$this->renderHtmlAttributes()}
                >{$this->label}</button>
                ";
    }
}