<?php


namespace Cbatista8a\Formbuilder\Classes;

class TextArea extends Element
{

    public function render(): string
    {
        return "<textarea
                    {$this->renderHtmlAttributes()}
                    >{$this->getAttributeValue('value')}</textarea>
                ";
    }
}