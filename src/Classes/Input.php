<?php

namespace Cbatista8a\Formbuilder\Classes;

use Cbatista8a\Formbuilder\Interfaces\HtmlElement;

class Input extends Element implements HtmlElement
{

    private string $type;

    public function __construct(string $type)
    {
        parent::__construct();
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