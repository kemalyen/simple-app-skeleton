<?php
declare(strict_types = 1);

namespace Teuton\Simple\Service\Article;

use Doctrine\ORM\EntityManager;
use Teuton\Simple\Model\Article\Article;
use Teuton\Simple\Service\Article\SearchArticlesInterface;

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