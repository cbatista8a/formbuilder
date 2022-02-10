<?php
namespace Cbatista8a\Formbuilder\Classes;

use Cbatista8a\Formbuilder\Interfaces\Form;

class FormBuilder
{
    private Form $model;
    private string $classes;
    private string $submit_name;
    private $id;

    public function __construct(Form $model, $id, $submit_name = 'Submit', $classes = 'form')
    {
        $this->model = $model;
        $this->classes = $classes;
        $this->id = $id;
        $this->submit_name = $submit_name;
    }

    public function build(): string
    {
        $form = $this->getFormHeader();
        foreach ($this->model->getFormFields() as $field){
            $form .= $field->render();
        }
        $form .= $this->getFormButton();
        $form .= $this->getFormCloseTag();

        return $form;
    }

    private function getFormHeader()
    {
        return "<form action='{$this->model->getFormAction()}'
                method='{$this->model->getFormMethod()}'
                class='{$this->classes}'
                id='{$this->id}'
                >";
    }

    private function getFormCloseTag()
    {
        return "</form>";
    }

    private function getFormButton()
    {
        return "<button
                type='submit'
                name='{$this->submit_name}'
                >
                {$this->submit_name}
                </button>";
    }
}