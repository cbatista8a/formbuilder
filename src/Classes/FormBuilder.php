<?php

namespace Cbatista8a\Formbuilder\Classes;

use Cbatista8a\Formbuilder\Interfaces\HtmlElement;
use Cbatista8a\Formbuilder\Interfaces\ModelFormImplementer;

class FormBuilder extends Element
{
    /**
     * @var Input[]
     */
    private array $fields;
    /**
     * @var string[]
     */
    private array $groups;

    public function __construct($method = HttpMethod::POST)
    {
        $this->addElement(
            (new Input('hidden'))
                ->addAttribute(new Attribute('method', $method))
        )->addAttribute(new Attribute('method', $method));
    }

    public function addElement(HtmlElement $field, string $group_name = 'group', string $group_classes = 'row'): FormBuilder
    {
        $this->fields[$group_name][] = $field;
        $this->groups[$group_name] = $group_classes . ' form-group';
        return $this;
    }

    public function extractObjectFields(ModelFormImplementer $model, string $group_name = 'group', string $group_classes = 'row'): FormBuilder
    {
        foreach ($model->getFormFields() as $field) {
            $this->addElement($field, $group_name, $group_classes);
        }
        return $this;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return $this->build();
    }

    public function build(): string
    {
        $form = $this->getFormHeader();
        foreach ($this->groups as $group => $classes) {
            $form .= "<div id='{$group}' class='{$classes}'>";
            $form .= $this->renderElementsGroup($group);
            $form .= "</div>";
        }
        $form .= $this->getFormCloseTag();

        return $form;
    }

    private function getFormHeader(): string
    {
        return "<form 
                   {$this->renderHtmlAttributes()}
                >";
    }

    /**
     * @param $group
     * @return string
     */
    private function renderElementsGroup($group): string
    {
        $elements = "";
        /** @var HtmlElement $field */
        foreach ($this->fields[$group] as $field) {
            $elements .= $field->render();
        }
        return $elements;
    }

    private function getFormCloseTag(): string
    {
        return "</form>";
    }
}