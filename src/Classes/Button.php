<?php


namespace Cbatista8a\Formbuilder\Classes;


use Cbatista8a\Formbuilder\Interfaces\HtmlElement;

class Button extends Element implements HtmlElement
{

    private string $type;
    private string $label;

    public function __construct(string $type, string $label)
    {
        parent::__construct();
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