<?php
declare(strict_types = 1);

namespace Teuton\Simple\Service\Article;

use Teuton\Simple\Model\Article;

interface SearchArticlesInterface
{
    /**
     * @return Article[]
     */
    public function __invoke() : array;
}
