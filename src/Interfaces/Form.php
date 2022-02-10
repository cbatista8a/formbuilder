<?php
namespace Cbatista8a\Formbuilder\Interfaces;

use Cbatista8a\Formbuilder\Model\Field;

interface Form
{

    /**
     * @return Field[]
     */
    public function getFormFields(): array;

    public function getFormAction() : string;
    public function getFormMethod() : string;

}