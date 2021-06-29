<?php
/**
 * Error Controller
 *
 * @desc
 * @category Class
 * @package  Teuton\Simple
 * @license  CC-BY-NC-ND-4.0
 * @author   Erik Pöhler <info@teuton.mx>
 * @link     https://www.teuton.mx/
 */
declare(strict_types = 1);

namespace Teuton\Simple\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Psr\Log\LoggerInterface;

class ErrorController {
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
    
    public function __construct(
        Request $request,
        Response $response,
        Environment $twig,
        LoggerInterface $logger
    )
    {
        $this->request = $request;
        $this->response= $response;
        $this->twig = $twig;
        $this->logger = $logger;
    }
    
    public  function notFound() {
        return $this->response->setContent($this->twig->render('error/404.twig'));
    }
    
    public function methodNotAllowed() {
        return $this->response->setContent($this->twig->render('error/405.twig'));
    }
    
    public function exception(\Exception $e) {
        return $this->response->setContent($this->twig->render('error/500.twig', (array) $e));
    }
}