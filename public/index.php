<?php
/**
 * Short and simple.
 * @package  Teuton\Simple
 * @license  CC-BY-NC-ND-4.0
 * @author   Erik Pöhler <info@teuton.mx>
 * @link     https://www.teuton.mx/
 */
declare(strict_types = 1);

error_reporting(E_ALL);

if ((php_sapi_name() === 'cli-server' || php_sapi_name() === 'cli') && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))
) {
    return false;
}

chdir(dirname(__DIR__));

require_once 'config/app.php';