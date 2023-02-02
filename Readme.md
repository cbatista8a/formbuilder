# FormBuilder

Simple POO Form Builder for PHP projects


## Getting Started

These instructions will give you a copy of the project up and running on
your local machine for development and testing purposes.

### Prerequisites

- PHP 7.4
- [composer](https://getcomposer.org)

### Installing


clone repo from GitHub

    git clone https://github.com/cbatista8a/formbuilder.git

or

    composer require cbatista8a/formbuilder

use autoload 

    require_once './vendor/autoload.php';
    
Create the Form Object and add some elements and attributes
    
    $form = new FormBuilder();
    $form->addAttribute(new Attribute('id','form-test'))
     ->addAttribute(new Attribute('action','example.php'))
     ->addAttribute(new Attribute('class','form-group'))
     ->extractObjectFields($model,'model-group','row')
     ->addElement(new Button('submit','Save'),'form-footer');
     
If your are ready, just render the HTML and enjoy

    echo $form->build();

`Element` is an abstract class and it's the parent of all other HTML Tags

`Input` is a basic element of any HTML Form, this is an example
of its implementation:

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
    
Don't implement this basic element, it's already present on this library 




## Built With Love and

  - PHP
  - composer

## Contributing

You are invited to do pull requests and contribute with us.

## Versioning

We use [Semantic Versioning](http://semver.org/)

## Authors

  - **Carlos Batista** 


## License

This project is licensed under the [MIT](https://mit-license.org/) License - see the [LICENSE.md](LICENSE.md) file for
details.
