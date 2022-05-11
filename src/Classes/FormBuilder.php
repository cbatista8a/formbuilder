<?php
namespace Cbatista8a\Formbuilder\Classes;

use Cbatista8a\Formbuilder\Interfaces\HtmlElement;

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
        //parent::__construct();
        $this->addElement(
            (new Input('hidden'))
                ->addAttribute(new Attribute('method',$method))
            );
        $this->addAttribute(new Attribute('method',$method));
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
        return "<form 
                   {$this->renderHtmlAttributes()}
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
        /** @var HtmlElement $field */
        foreach ($this->fields[$group] as $field) {
            $elements .= $field->render();
        }
        return $elements;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return $this->build();
    }
}