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

    public function addElement(HtmlElement $field, string $group_name = 'group', string $group_classes = 'row'): FormBuilder
    {
        $this->fields[$group_name][] = $field;
        $this->groups[$group_name] = $group_classes.' form-group';
        return $this;
    }

    /**
     * @param $group
     * @return string
     */
    private function renderElementsGroup($group): string
    {
        $elements = "";
        foreach ($this->fields[$group] as $field) {
            $elements .= $field->render();
        }
        return $elements;
    }
}