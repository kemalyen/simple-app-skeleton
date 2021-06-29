<?php

namespace Teuton\Simple\Models\Article;

use Ramsey\Uuid\Uuid;

class Article
{
    /** @var Uuid $id */ 
    private $id;
    
    /** @var string $title */
    private $title;
    
    /** @var string $content */
    private $content;

    public function __construct(string $title, string $content)
    {
        $this->id = Uuid::uuid4();
        $this->title = $title;
        $this->content = $content;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }
}
