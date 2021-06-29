<?php
declare(strict_types = 1);

namespace Teuton\Simple\Model\DBAL;

use Teuton\Simple\Model\Generic\PasswordHash;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class PasswordHashType extends StringType
{
    const NAME = 'passwordHash';

    public function convertToDatabaseValue($value, AbstractPlatform $platform) : string
    {
        return (string) $value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform) : PasswordHash
    {
        return PasswordHash::fromHash($value);
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform) : bool
    {
        return true;
    }

    public function getName() : string
    {
        return self::NAME;
    }
}
