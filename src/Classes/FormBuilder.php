<?php
namespace Cbatista8a\Formbuilder\Classes;

use Cbatista8a\Formbuilder\Interfaces\Form;

class FormBuilder
{
    private string $id;
    private string $classes;
    private string $action;
    private string $method;
    /**
     * @var Input[]
     */
    private array $fields;
    /**
     * @var string[]
     */
    private array $groups;

    public function __construct(string $id,string $action, string $method, string $classes = 'form')
    {
        $this->id = $id;
        $this->classes = $classes;
        $this->action = $action;
        $this->method = $method;
        $this->addElement(new Input('hidden','method','',true,$method));
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