<?php

require_once './vendor/autoload.php';

use Cbatista8a\Formbuilder\Classes\FormBuilder;
use Cbatista8a\Formbuilder\Classes\Button;
use Cbatista8a\Formbuilder\Classes\HttpMethod;
use Cbatista8a\Formbuilder\Model\Model;

$model = new Model();
$form = new FormBuilder('form-test', 'example.php', HttpMethod::POST, 'form-group');
foreach ($model->getFormFields() as $field){
    $form->addElement($field, 'group-model','row');
}
$form->addElement(new Button('button','submit','btn-submit','Submit'),'form-footer');
echo $form->build();
