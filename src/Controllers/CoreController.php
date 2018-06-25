<?php

namespace Phonebook\Controllers;

class CoreController
{

    // Va contenir l'objet Plates
    protected $templates;
    protected $router;
    protected $contacts;

    public function __construct( $router ) {

        $this->router = $router;

        // $this->user = \Phonebook\Models\ContactsModel::getContacts();

        $this->templates = new \League\Plates\Engine(__DIR__ . '/../Views/');

        $basePath = isset($_SERVER['BASE_URI']) ? $_SERVER['BASE_URI'] : '';

        // On ajoute les données disponibles dans tous les templates
        $this->templates->addData([
            'baseUrl' => $basePath,
            'router' => $this->router,
            'contacts' => $this->contacts
        ]);
    }

    // Fait une redirection HTTP
    // public function redirect( $routeName, $params=[] ) {
    public function redirect( $routeName ) {

        // On construit une redirection grâce à la méthode
        // "generate" en passant uniquement le nom de la route
        // header('Location: ' . $this->router->generate( $routeName, $params ) );
        header('Location: ' . $this->router->generate( $routeName) );
        exit();
    }
}
