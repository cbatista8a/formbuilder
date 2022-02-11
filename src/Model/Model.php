<?php
namespace Cbatista8a\Formbuilder\Model;

use Cbatista8a\Formbuilder\Interfaces\Form;

class Model implements Form
{

    public string $name = 'test';
    public string $lastname = 'pallino';
    public int $age = 30;
    public string $email = 'ciao@gmail.com';
    private $descripion = 'xfhcnshodrsjgvhmsdlkgjl dvgvhsglkmsvg hglhnuivghrjrt';
    private $id = 1;

    /**
     * @return Field[]
     */
    public function getFormFields(): array
    {
        return [
            new Field('text','name','name-field',true,$this->name),
            new Field('text','lastname','lastname-field',true,$this->lastname),
            new Field('number','age','age-field',false,$this->age),
            new Field('email','email','email-field',true,$this->email)
        ];
    }
}