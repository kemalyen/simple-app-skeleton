<?php
declare(strict_types = 1);

namespace Teuton\Simple\Model\User;

final class Role
{
    const ALLOWED_ROLES = ['admin', 'editor', 'guest'];
    
    /**
     * @var Role[]
     */
    private static $roleCache = [];
    
    /**
     * @var string
     */
    private $value;
    
    private function __construct(string $value)
    {
        $this->value = $value;
    }
    
    public static function fromString(string $role) : self
    {
        if (!in_array($role, self::ALLOWED_ROLES)) {
            throw new \Exception("Invalid role $role.");
        }
        
        if (array_key_exists($role, self::$roleCache)) {
            return self::$roleCache[$role];
        }
        
        return (self::$roleCache[$role] = new self($role));
    }
    
    public function __toString() : string
    {
        return $this->value;
    }
}
