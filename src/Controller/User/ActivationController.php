<?php
declare(strict_types = 1);

namespace Teuton\Simple\Controller\User;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Teuton\Simple\Interfaces\SearchArticlesInterface;

class ActivationController {
    /**
     * @var Request
     */
    protected $request;
    
    /**
     * @var Response
     */
    protected $response;

    public function __construct(
        \Symfony\Component\HttpFoundation\Request $request,
        \Symfony\Component\HttpFoundation\Response $response,
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