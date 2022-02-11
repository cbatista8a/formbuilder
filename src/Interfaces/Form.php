<?php
namespace Cbatista8a\Formbuilder\Interfaces;


interface Form
{

    /**
     * @return HtmlElement[]
     */
    public function getFormFields(): array;

}