<?php

namespace Teuton\Simple\Services;

use Doctrine\ORM\EntityManager;
use Teuton\Simple\Models\Article\Article;
use Teuton\Simple\Interfaces\SearchArticlesInterface;

class SearchArticles implements SearchArticlesInterface
{
    /** @var EntityManager $em */
    protected $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function __invoke() : array
    {
        return $this->em->getRepository(Article::class)->findAll();
    }
}