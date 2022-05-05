<?php


namespace Cbatista8a\Formbuilder\Classes;


class Element
{
    /**
     * @var Attribute[]
     */
    protected array $attributes = [];

    public function __construct()
    {
    }

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
     * @return string
     */
    public function renderHtmlAttributes():string
    {
        $html_attr = [];
        if (empty($this->attributes['id'])){
            $html_attr[] = 'id="'.$this->getRandomId() . '"';
        }
        foreach ($this->attributes as $attribute){
            $html_attr[] = $attribute->render();
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
}