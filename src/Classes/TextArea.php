<?php


namespace Cbatista8a\Formbuilder\Classes;


use Cbatista8a\Formbuilder\Interfaces\HtmlElement;

class TextArea extends Field implements HtmlElement
{

    public function render(): string
    {
        return "<textarea
                    name='{$this->name}'
                    id='{$this->id}'
                    class='{$this->classes}'
                    {$this->required}>{$this->value}</textarea>
                ";
    }
}