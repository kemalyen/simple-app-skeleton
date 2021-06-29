<?php
declare(strict_types = 1);

namespace Teuton\Simple\Models\DBAL;

use Teuton\Simple\Models\User\Role;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class RoleType extends StringType
{
    const NAME = 'accountRole';

    public function convertToDatabaseValue($value, AbstractPlatform $platform) : string
    {
        return (string) $value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform) : Role
    {
        return Role::fromString($value);
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
