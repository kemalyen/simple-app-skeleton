<?php

namespace Teuton\Simple\Models\User;

use Ramsey\Uuid\Uuid;
use RandomLib\Factory;
use SecurityLib\Strength;
use \Teuton\Simple\Models\Generic\EmailAddress;
use \Teuton\Simple\Models\Generic\PasswordHash;

class User {
    
    /**
     * @var string
     */
    private $id;
    
    /**
     * @var EmailAddress
     */
    private $emailAddress;
    
    /**
     * @var PasswordHash
     */
    private $passwordHash;
    
    /**
     * @var Role
     */
    private $role;
    
    /**
     * @var string
     */
    private $firstName;
    
    /**
     * @var string
     */
    private $lastName;
    
    /**
     * @var string
     */
    private $resetToken;
    
    /**
     * @var \DateTimeImmutable
     */
    private $resetTokenExpiresAt;
    
    /**
     * @var bool
     */
    private $isActive;
    
    /**
     * @var \DateTimeImmutable
     */
    private $createdAt;
    
    /**
     * @var \DateTimeImmutable
     */
    private $modifiedAt;
    
    public function __construct(
        EmailAddress $emailAddress,
        PasswordHash $passwordHash,
        Role $role,
        string $firstName,
        string $lastName,
        bool $isActive = true
        ) {
            $this->id = Uuid::uuid4();
            $this->emailAddress = $emailAddress;
            $this->passwordHash = $passwordHash;
            $this->role = $role;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->isActive = $isActive;
            $this->createdAt= new \DateTimeImmutable('now');
            $this->modifiedAt = null;
    }
}