<?php
declare(strict_types = 1);

namespace Teuton\Simple\Form;

use Laminas\Form\Element;
use Laminas\Form\Form;

class LoginForm extends Form {
    
    const NAME = 'login';
    
    public function __contruct()
    {
        parent::__construct(self::NAME);
        
        $this->add( new Element\Email('email') );
        $this->add( new Element\Password('password') );
        $this->add( new Element\Csrf('security') );
        $this->add( new Element\Submit('send') );
    }
}