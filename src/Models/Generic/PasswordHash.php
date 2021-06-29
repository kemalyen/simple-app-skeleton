<?php
declare(strict_types = 1);

namespace Teuton\Simple\Models\Generic;

final class PasswordHash
{
    /**
     * @var string
     */
    private $hash;

    private function __construct(string $hash)
    {
        $this->hash = $hash;
    }

    public static function fromPassword(string $password) : self
    {
        return new self(password_hash($password, PASSWORD_ARGON2ID));
    }

    public static function fromHash(string $hash) : self
    {
        return new self($hash);
    }

    public function doesMatch(string $password) : bool
    {
        return password_verify($password, $this->hash);
    }

    public function __toString() : string
    {
        return $this->hash;
    }
}
