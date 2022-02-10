<?php

require_once './vendor/autoload.php';

use Cbatista8a\Formbuilder\Classes\FormBuilder;
use Cbatista8a\Formbuilder\Model\Model;


$form = new FormBuilder(new Model(),'form-test', 'Envia', 'form-group');

echo $form->build();
