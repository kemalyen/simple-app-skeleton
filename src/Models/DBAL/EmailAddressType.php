<?php
declare(strict_types = 1);

namespace Teuton\Simple\Models\DBAL;

use Teuton\Simple\Models\Generic\EmailAddress;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class EmailAddressType extends StringType
{
    const NAME = 'emailAddress';

    public function convertToDatabaseValue($value, AbstractPlatform $platform) : string
    {
        return (string) $value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform) : EmailAddress
    {
        return EmailAddress::fromString($value);
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
