<?php
declare(strict_types = 1);

namespace SepMonitor\Infrastructure\Rbac;

use Zend\Permissions\Rbac\AbstractRole;

final class GuestRole extends AbstractRole
{
    public function __construct()
    {
        // account
        $this->addPermission('account/login');
        $this->addPermission('account/restore-password');
        $this->addPermission('account/reset-password');

        // twitter
        $this->addPermission('guest/twitter/callback');
        $this->addPermission('public/news/rss');
    }
}
