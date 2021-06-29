<?php
declare(strict_types = 1);

namespace Teuton\Simple\Models\Rbac;

use Teuton\Simple\Models\User\User;
use Laminas\Permissions\Rbac\Role;

final class EditorRole extends Role
{
    public function __construct(User $user)
    {
        $this->addPermission('account/profile');

        // news
        $this->addPermission('editor/news');
        $this->addPermission('editor/news/add');
        $this->addPermission('editor/news/edit');
        $this->addPermission('editor/news/view');
        $this->addPermission('editor/news/category-add');
        $this->addPermission('editor/news/category-remove');
        $this->addPermission('editor/news/delete');
        $this->addPermission('editor/news/image-add');
        $this->addPermission('editor/news/video-add');
        $this->addPermission('editor/news/image-upload');
        $this->addPermission('admin/data-tables-news-search');
        $this->addPermission('admin/news-preview');
        $this->addPermission('editor/news/relevance');
        $this->addPermission('editor/news/sentiment');

        // categories
        $this->addPermission('admin/category');
        $this->addPermission('admin/category/add');
        $this->addPermission('admin/category/edit');
        $this->addPermission('admin/category/delete');
        $this->addPermission('admin/data-tables-category-search');

        // media
        $this->addPermission('editor/media/by-type');
    }
}
