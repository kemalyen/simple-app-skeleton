<?php
declare(strict_types = 1);

namespace Teuton\Simple\Form;

use Laminas\Form\Form;

class RequestPasswordResetForm extends Form {
    
    public function __contruct()
    {
        parent::__construct(self::NAME);
        
        $this->add( new Element\Email('email') );
        $this->add( new Element\Submit('send') );
    }
}