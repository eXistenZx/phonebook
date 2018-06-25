<?php

namespace Phonebook\Controllers;

class MainController extends CoreController
{

    public function home() {
        $contacts = \Phonebook\Models\ContactsModel::findAll();
        echo $this->templates->render(
            'main/home',
            [
                'title' => 'Phonebook',
                'contacts' => $contacts
            ]
        );
    }

    public function error404() {
        echo $this->templates->render('main/404');
    }
}
