<?php

namespace Phonebook\Controllers;

class CoreController
{
    protected $templates;
    protected $router;
    protected $contacts;

    public function __construct( $router )
    {
        $this->router = $router;
        $this->templates = new \League\Plates\Engine(__DIR__ . '/../Views/');
        $basePath = isset($_SERVER['BASE_URI']) ? $_SERVER['BASE_URI'] : '';
        $this->templates->addData([
            'baseUrl' => $basePath,
            'router' => $this->router,
            'contacts' => $this->contacts
        ]);

        if (!empty($_SESSION['plates_message'])) {
            $this->templates->addData(['message' => $_SESSION['plates_message']]);
            $_SESSION['plates_message'] = '';
        }
    }

    public function redirect( $routeName )
    {
        header('Location: ' . $this->router->generate( $routeName) );
        exit();
    }

    public function storeMessage($message)
    {
        $_SESSION['plates_message'] = $message;
    }
}
