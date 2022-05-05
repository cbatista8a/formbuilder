<?php
namespace Cbatista8a\Formbuilder\Interfaces;


interface ModelFormImplementer
{

    /**
     * @return HtmlElement[]
     */
    public function getFormFields(): array;

}