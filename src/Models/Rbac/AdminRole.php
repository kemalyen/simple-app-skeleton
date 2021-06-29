<?php
declare(strict_types = 1);

namespace Teuton\Simple\Models\Rbac;

use Teuton\Simple\Models\User\User;
use Laminas\Permissions\Rbac\Role;

final class AdminRole extends Role
{
    public function __construct()
    {
        // home
        $this->addPermission('home');

        // accounts
        $this->addPermission('admin/account');
        $this->addPermission('admin/account/add');
        $this->addPermission('admin/account/edit');
        $this->addPermission('admin/data-tables-account-search');

        // terms/keywords
        $this->addPermission('admin/term');
        $this->addPermission('admin/term/add');
        $this->addPermission('admin/term/edit');
        $this->addPermission('admin/term/upload');
        $this->addPermission('admin/term/download');
        $this->addPermission('admin/term/delete'); // ajax
        $this->addPermission('admin/term/activate'); // ajax
        $this->addPermission('admin/term/deactivate'); // ajax
        $this->addPermission('admin/term/add-child'); // ajax
        $this->addPermission('admin/term/remove-child'); // ajax
        $this->addPermission('admin/term/load-children'); // ajax
        $this->addPermission('admin/data-tables-term-search');
        $this->addPermission('admin/data-tables-term-children-search');
        $this->addPermission('admin/data-tables-term-not-children-search');

        // states/regions
        $this->addPermission('admin/state');
        $this->addPermission('admin/data-tables-state-search');

        // news
        $this->addPermission('editor/news');
        $this->addPermission('editor/news/add');
        $this->addPermission('editor/news/edit');
        $this->addPermission('editor/news/delete');
        $this->addPermission('editor/news/category-add'); // ajax
        $this->addPermission('editor/news/category-remove'); // ajax
        $this->addPermission('editor/news/view');
        $this->addPermission('editor/news/video-add'); // ajax
        $this->addPermission('editor/news/image-add'); // ajax
        $this->addPermission('editor/news/image-delete'); // ajax
        $this->addPermission('editor/news/image-upload'); // ajax
        $this->addPermission('admin/news-preview'); // ajax
        $this->addPermission('editor/news/classify');
        $this->addPermission('editor/news/relevance');
        $this->addPermission('editor/news/sentiment');
        $this->addPermission('editor/news/emergency');
        $this->addPermission('public/news/rss'); // xml
        $this->addPermission('admin/data-tables-news-search');

        // Category
        $this->addPermission('admin/category');
        $this->addPermission('admin/category/add');
        $this->addPermission('admin/category/edit');
        $this->addPermission('admin/category/delete');
        $this->addPermission('admin/data-tables-category-search');

        // Media
        $this->addPermission('admin/media');
        $this->addPermission('admin/media/add');
        $this->addPermission('admin/media/edit');
        $this->addPermission('admin/media/delete');
        $this->addPermission('admin/media/activate');
        $this->addPermission('admin/media/deactivate');
        $this->addPermission('admin/data-tables-media-search');
        $this->addPermission('editor/media/by-type');

        // facebook
        $this->addPermission('admin/facebook/login');
        $this->addPermission('admin/facebook/callback');

        // twitter
        $this->addPermission('admin/twitter');
        $this->addPermission('guest/twitter/callback');

        // maintenance
        $this->addPermission('admin/system');
    }
}
