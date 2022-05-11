<?php

namespace Cbatista8a\Formbuilder\Classes;

class Input extends Element
{

    private string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    public function render(): string
    {
        return "<input type='{$this->type}'
                   {$this->renderHtmlAttributes()}
                >
        ";
    }
}