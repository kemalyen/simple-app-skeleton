<?php
declare(strict_types = 1);

namespace Teuton\Simple\Model\Generic;

final class EmailAddress
{
    /**
     * @var string
     */
    private $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromString(string $emailAddress) : self
    {
        if (false === filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
        }

        return new self($emailAddress);
    }

    public function __toString() : string
    {
        return $this->value;
    }
}
