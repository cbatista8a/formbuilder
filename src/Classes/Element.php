<?php


namespace Cbatista8a\Formbuilder\Classes;


use Cbatista8a\Formbuilder\Interfaces\HtmlElement;

abstract class Element implements HtmlElement
{
    /**
     * @var Attribute[]
     */
    protected array $attributes = [];

    /**
     * @param Attribute $attribute
     * @return $this
     */
    public function addAttribute(Attribute $attribute)
    {
        $this->attributes[$attribute->getName()] = $attribute;
        return $this;
    }

    /**
     * @return Attribute[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function getAttributeValue($name)
    {
        if (!isset($this->attributes[$name])){
            return '';
        }

        return $this->attributes[$name]->getValue();
    }

    /**
     * @param array $exclude
     * @return string
     * @throws \Exception
     */
    public function renderHtmlAttributes($exclude = []):string
    {
        $html_attr = [];
        if (empty($this->attributes['id'])){
            $html_attr[] = 'id="'.$this->getRandomId() . '"';
        }
        foreach ($this->attributes as $attribute){
            if (!in_array($attribute->getName(),$exclude,true)) {
                $html_attr[] = $attribute->render();
            }
        }
        return implode(' ',$html_attr);
    }

    /**
     * @return string
     * @throws \Exception
     */
    protected function getRandomId(): string
    {
        return  bin2hex(random_bytes(10));
    }

    abstract public function render(): string;
}