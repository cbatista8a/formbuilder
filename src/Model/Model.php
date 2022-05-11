<?php
namespace Cbatista8a\Formbuilder\Model;

use Cbatista8a\Formbuilder\Classes\Attribute;
use Cbatista8a\Formbuilder\Classes\Input;
use Cbatista8a\Formbuilder\Classes\TextArea;
use Cbatista8a\Formbuilder\Interfaces\ModelFormImplementer;
use Cbatista8a\Formbuilder\Interfaces\HtmlElement;

class Model implements ModelFormImplementer
{

    public string $name = 'test';
    public string $lastname = 'pallino';
    public int $age = 30;
    public string $email = 'ciao@gmail.com';
    private $descripion = 'xfhcnshodrsjgvhmsdlkgjl dvgvhsglkmsvg hglhnuivghrjrt';
    private int $id = 1;

    /**
     * @return HtmlElement[]
     */
    public function getFormFields(): array
    {
        return [
            (new Input('hidden'))
                ->addAttribute(new Attribute('name','id'))
                ->addAttribute(new Attribute('class','form-field'))
                ->addAttribute(new Attribute('value',$this->id)),
            (new Input('text'))
                ->addAttribute(new Attribute('name','name'))
                ->addAttribute(new Attribute('class','form-field'))
                ->addAttribute(new Attribute('value',$this->name)),
            (new Input('text'))
                ->addAttribute(new Attribute('name','lastname'))
                ->addAttribute(new Attribute('class','form-field'))
                ->addAttribute(new Attribute('value',$this->lastname)),
            (new Input('number'))
                ->addAttribute(new Attribute('name','age'))
                ->addAttribute(new Attribute('class','form-field'))
                ->addAttribute(new Attribute('value',$this->age)),
            (new Input('email'))
                ->addAttribute(new Attribute('name','email'))
                ->addAttribute(new Attribute('class','form-field'))
                ->addAttribute(new Attribute('required',null))
                ->addAttribute(new Attribute('value',$this->email)),
            (new TextArea())
                ->addAttribute(new Attribute('class','form-field'))
                ->addAttribute(new Attribute('name','description'))
                ->addAttribute(new Attribute('value',$this->descripion))
                ->addAttribute(new Attribute('id','textarea'))
        ];
    }
}