<?php

namespace Teuton\Simple\Interfaces;

use Teuton\Simple\Model\Article;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * This is an interface so that the model is coupled to a specific backend.
 *
 * This is also so that we can demonstrate how to bind an interface
 * to an implementation with PHP-DI.
 */
interface ArticleRepositoryInterface
{
    /**
     * @return Article[]
     */
    public function getArticles() : ArrayCollection;

    /**
     * @param string $id
     * @return Article
     */
    public function getArticle($id) : Article;
}
