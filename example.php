<?php

require_once './vendor/autoload.php';

use Cbatista8a\Formbuilder\Classes\Attribute;
use Cbatista8a\Formbuilder\Classes\FormBuilder;
use Cbatista8a\Formbuilder\Classes\Button;
use Cbatista8a\Formbuilder\Model\Model;

$model = new Model();
$form = new FormBuilder();
$form->addAttribute(new Attribute('id','form-test'))
    ->addAttribute(new Attribute('action','example.php'))
    ->addAttribute(new Attribute('class','form-group'))
    ->extractObjectFields($model,'model-group','row')
    ->addElement(new Button('submit','Save'),'form-footer');
echo $form->build();
