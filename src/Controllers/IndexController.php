<?php 
/**
 * Comparis (CH only) Controller - prepares data and passes it to specific template
 *
 * @desc
 * @category Class
 * @package  Teuton\Simple
 * @license  CC-BY-NC-ND-4.0
 * @author   Erik Pöhler <info@teuton.mx>
 * @link     https://www.teuton.mx/
 */
declare(strict_types = 1);

namespace Teuton\Simple\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Doctrine\ORM\EntityManager;
use Teuton\Simple\Models\Article\Article;
use Teuton\Simple\Repositories\ArticleRepository;
use Teuton\Simple\Interfaces\SearchArticlesInterface;
use Teuton\Simple\Forms\LoginForm;
use Symfony\Component\HttpFoundation\RedirectResponse;

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