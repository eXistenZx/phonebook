<?php
namespace Phonebook;

class Application
{

    public function __construct()
    {
        $config = parse_ini_file(__DIR__ . '/../config.conf');
        \Phonebook\Utils\Database::setConfig( $config );
        $this->router = new \AltoRouter();
        $basePath = isset($_SERVER['BASE_URI']) ? $_SERVER['BASE_URI'] : '';
        $this->router->setBasePath($basePath);
        $this->mapping();
    }

    public function mapping()
    {
        // Home page
        $this->router->map('GET', '/', ['MainController', 'home'], 'home');
        // Create contact page
        $this->router->map('GET|POST', '/contact/create', ['ContactsController', 'create'], 'contact_create');
        // Search contact
        $this->router->map('GET', '/', ['ContactsController', 'search'], 'contacts_search');
        // Update contact page
        $this->router->map('GET|POST', '/contact/update', ['ContactsController', 'update'], 'contact_update');
        // Delete contact
        $this->router->map('GET', '/delete', ['ContactsController', 'delete'], 'contact_delete');
    }

    public function run ()
    {
        $match = $this->router->match();
        if (!$match) {
            $controllerName = "\Phonebook\Controllers\MainController";
            $methodName = 'error404';
        } else {
            $controllerName = "\Phonebook\Controllers\\" . $match['target'][0];
            $methodName = $match['target'][1];
        }
        $controller = new $controllerName( $this->router );
        $controller->$methodName( $match['params'] );
    }
}
