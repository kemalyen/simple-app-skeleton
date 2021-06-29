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

    /**
     * Set title.
     *
     * @param string|null $title
     *
     * @return Article
     */
    public function setTitle($title = null) : self
    {
        $this->title = $title;
        
        return $this;
    }
    
    /**
     * Get title.
     *
     * @return string|null
     */
    public function getTitle() : ?string
    {
        return $this->title;
    }
    
    /**
     * Set content.
     *
     * @param string|null $content
     *
     * @return Article
     */
    public function setContent($content = null) : self
    {
        $this->content = $content;
        
        return $this;
    }
    
    /**
     * Get content.
     *
     * @return string|null
     */
    public function getContent() : ?string
    {
        return $this->content;
    }
    
    /**
     * Set id.
     *
     * @param string $id
     *
     * @return Article
     */
    public function setId(Uuid $id) : self
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * Get id.
     *
     * @return Uuid
     */
    public function getId() : Uuid
    {
        return $this->id;
    }
}
