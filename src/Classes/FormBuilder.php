<?php
namespace Cbatista8a\Formbuilder\Classes;

use Cbatista8a\Formbuilder\Interfaces\HtmlElement;

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
        foreach ($this->groups as $group => $classes){
            $form .= "<div id='{$group}' class='{$classes}'>";
            $form .= $this->renderElementsGroup($group);
            $form .= "</div>";
        }
        $form .= $this->getFormCloseTag();

        return $form;
    }

    private function getFormHeader(): string
    {
        return "<form action='{$this->action}'
                method='{$this->method}'
                id='{$this->id}'
                class='{$this->classes}'
                >";
    }

    private function getFormCloseTag(): string
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