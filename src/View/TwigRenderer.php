<?php 
/**
 * Template Provider
 *
 * @category Class
 * @package  Teuton\Simple
 * @license  CC-BY-NC-ND-4.0
 * @author   Erik Pöhler <info@teuton.mx>
 * @link     https://www.teuton.mx/
 */
declare(strict_types = 1);

namespace Teuton\Simple\View;

use Twig\Environment;

class TwigRenderer {
    
    private $environment;

    public function __construct(\Twig\Environment $environment) {
        $this->environment = $environment;
    }

    public function render(string $template, array $data = []) : string 
    {
        return $this->environment->render($template, $data);
    }
}