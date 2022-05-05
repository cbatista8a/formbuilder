<?php


namespace Cbatista8a\Formbuilder\Classes;


use Cbatista8a\Formbuilder\Interfaces\HtmlElement;

class TextArea extends Element implements HtmlElement
{

    public function render(): string
    {
        return "<textarea
                    {$this->renderHtmlAttributes()}
                    >{$this->getAttributeValue('value')}</textarea>
                ";
    }
}