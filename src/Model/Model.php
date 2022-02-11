<?php
namespace Cbatista8a\Formbuilder\Model;

use Cbatista8a\Formbuilder\Classes\Input;
use Cbatista8a\Formbuilder\Classes\TextArea;
use Cbatista8a\Formbuilder\Interfaces\Form;
use Cbatista8a\Formbuilder\Interfaces\HtmlElement;

class Model implements Form
{

    public string $name = 'test';
    public string $lastname = 'pallino';
    public int $age = 30;
    public string $email = 'ciao@gmail.com';
    private $descripion = 'xfhcnshodrsjgvhmsdlkgjl dvgvhsglkmsvg hglhnuivghrjrt';
    private $id = 1;

    /**
     * @return HtmlElement[]
     */
    public function getFormFields(): array
    {
        return [
            new Input('hidden', 'id', 'hidden-id', true, $this->id),
            new Input('text', 'name', 'name-field', true, $this->name),
            new Input('text', 'lastname', 'lastname-field', true, $this->lastname),
            new Input('number', 'age', 'age-field', false, $this->age),
            new Input('email', 'email', 'email-field', true, $this->email),
            new TextArea('description', 'description-field', false,  $this->descripion)
        ];
    }
}