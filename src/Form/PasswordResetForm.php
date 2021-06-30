<?php
declare(strict_types = 1);

namespace Teuton\Simple\Form;

use Laminas\Form\Form;

class PasswordResetForm extends Form {
    
    public function __contruct()
    {
        parent::__construct(self::NAME);
        
        $this->add( new Element\Password('password') );
        $this->add( new Element\Password('password-repeat') );
        
        $this->add( new Element\Csrf('security') );
        $this->add( new Element\Submit('send') );
    }
}