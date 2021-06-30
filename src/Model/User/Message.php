<?php
declare(strict_types = 1);

namespace Teuton\Simple\Model\User;

use Monolog\DateTimeImmutable;
use Ramsey\Uuid\Uuid;

final class Message {
    /** @var Uuid */
    private $id;

    /** @var User */
    private $recipient;
    
    /** @var User */
    private $blindCopy;
    
    /** @var string */
    private $subject;
    
    /** @var string */
    private $message;
    
    /** @var bool */
    private $sent;
    
    /** @var DateTimeImmutable */
    private $sentAt;
    
    /** @var DateTimeImmutable */
    private $createdAt;
    
    public function __construct()
    {
        
    }
}