<?php 
declare(strict_types = 1);

namespace Teuton\Simple\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Teuton\Simple\Interfaces\SearchArticlesInterface;
use Teuton\Simple\Form\LoginForm;
use Twig\Environment;

class IndexController {
    /**
    * @var Request
    */
    protected $request;
    
    /**
     * @var Response
     */
    protected $response;
    /**
     * @var Environment
     */
    protected $twig;
    
    /** @var SearchArticlesInterface */
    protected $articles;

    public function __construct(
        \Symfony\Component\HttpFoundation\Request $request,
        \Symfony\Component\HttpFoundation\Response $response,
        \Twig\Environment $twig,
        SearchArticlesInterface $articles
    ) 
    {
        $this->request = $request;
        $this->response= $response;
        $this->twig = $twig;
        $this->articles = $articles;
    }

    public function __invoke() : Response
    {
        $form = new LoginForm();
        $form->populateValues($this->request->request->getIterator());
        if ($this->request->isMethod('post')) {
            if ($form->isValid()) {
                return new RedirectResponse('/private');
            }
        }
        
        
        $articles = $this->articles->__invoke();
        $this->response->setContent($this->twig->render('home.twig', ['articles' => $articles, 'form' => $form]));
        return $this->response;
    }
}