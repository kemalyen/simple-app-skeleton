<?php

namespace Teuton\Simple\Model\User;

use DateTimeImmutable;
use Ramsey\Uuid\Uuid;
use RandomLib\Factory;
use SecurityLib\Strength;
use \Teuton\Simple\Model\Generic\EmailAddress;
use \Teuton\Simple\Model\Generic\PasswordHash;
use Doctrine\DBAL\Types\DateTimeImmutableType;

class User {
    
    /**
     * @var Uuid
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
     * @var DateTimeImmutable
     */
    private $resetTokenExpiresAt;
    
    /** @var Message[] */
    private $messages;
    
    /**
     * @var bool
     */
    private $isActive;
    
    /** @var DateTimeImmutable */
    private $activatedAt;
    /**
     * @var DateTimeImmutable
     */
    private $createdAt;
    
    /**
     * @var DateTimeImmutable
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
    
    /**
     * Set emailAddress.
     *
     * @param emailAddress $emailAddress
     *
     * @return User
     */
    public function setEmailAddress($emailAddress) : self
    {
        $this->emailAddress = $emailAddress;
        
        return $this;
    }
    
    /**
     * Get emailAddress.
     *
     * @return emailAddress
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }
    
    /**
     * Set passwordHash.
     *
     * @param passwordHash $passwordHash
     *
     * @return User
     */
    public function setPasswordHash($passwordHash) : self
    {
        $this->passwordHash = $passwordHash;
        
        return $this;
    }
    
    /**
     * Get passwordHash.
     *
     * @return passwordHash
     */
    public function getPasswordHash()
    {
        return $this->passwordHash;
    }
    
    /**
     * Set role.
     *
     * @param role $role
     *
     * @return User
     */
    public function setRole($role) : self
    {
        $this->role = $role;
        
        return $this;
    }
    
    /**
     * Get role.
     *
     * @return role
     */
    public function getRole()
    {
        return $this->role;
    }
    
    /**
     * Set firstName.
     *
     * @param string|null $firstName
     *
     * @return User
     */
    public function setFirstName($firstName = null) : self
    {
        $this->firstName = $firstName;
        
        return $this;
    }
    
    /**
     * Get firstName.
     *
     * @return string|null
     */
    public function getFirstName() : string
    {
        return $this->firstName;
    }
    
    /**
     * Set lastName.
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName(string $lastName) : self
    {
        $this->lastName = $lastName;
        
        return $this;
    }
    
    /**
     * Get lastName.
     *
     * @return string
     */
    public function getLastName() : string
    {
        return $this->lastName;
    }
    
    /**
     * Set resetToken.
     *
     * @param string|null $resetToken
     *
     * @return User
     */
    public function setResetToken(string $resetToken = null) : self
    {
        $this->resetToken = $resetToken;
        
        return $this;
    }
    
    /**
     * Get resetToken.
     *
     * @return string|null
     */
    public function getResetToken() : string
    {
        return $this->resetToken;
    }
    
    /**
     * Set resetTokenExpiresAt.
     *
     * @param \DateTimeImmutable|null $resetTokenExpiresAt
     *
     * @return User
     */
    public function setResetTokenExpiresAt(\DateTimeImmutable $resetTokenExpiresAt = null) : self
    {
        $this->resetTokenExpiresAt = $resetTokenExpiresAt;
        
        return $this;
    }
    
    /**
     * Get resetTokenExpiresAt.
     *
     * @return \DateTimeImmutable|null
     */
    public function getResetTokenExpiresAt() : ?\DateTimeImmutable
    {
        return $this->resetTokenExpiresAt;
    }
    
    /**
     * Set isActive.
     *
     * @param bool $isActive
     *
     * @return User
     */
    public function setIsActive($isActive) : self
    {
        $this->isActive = $isActive;
        
        return $this;
    }
    
    /**
     * Get isActive.
     *
     * @return bool
     */
    public function getIsActive() : bool
    {
        return $this->isActive;
    }
    
    /**
     * Set createdAt.
     *
     * @param \DateTimeImmutable $createdAt
     *
     * @return User
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt) : self
    {
        $this->createdAt = $createdAt;
        
        return $this;
    }
    
    /**
     * Get createdAt.
     *
     * @return \DateTimeImmutable
     */
    public function getCreatedAt() : \DateTimeImmutable
    {
        return $this->createdAt;
    }
    
    /**
     * Set modifiedAt.
     *
     * @param \DateTimeImmutable|null $modifiedAt
     *
     * @return User
     */
    public function setModifiedAt(\DateTimeImmutable $modifiedAt = null) : self
    {
        $this->modifiedAt = $modifiedAt;
        
        return $this;
    }
    
    /**
     * Get modifiedAt.
     *
     * @return \DateTimeImmutable|null
     */
    public function getModifiedAt() : ?\DateTimeImmutable
    {
        return $this->modifiedAt;
    }
    
    /**
     * Set id.
     *
     * @param Uuid $id
     *
     * @return User
     */
    public function setId(Uuid $id) : self
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * Get id.
     *
     * @return Uuid
     */
    public function getId() : Uuid
    {
        return $this->id;
    }
}