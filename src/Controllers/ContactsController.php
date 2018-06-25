<?php

namespace Phonebook\Controllers;

use \Phonebook\Models\ContactsModel;

class ContactsController extends CoreController
{
    // Create contact
    public function create()
    {
        $message = '';

        if (isset($_POST['name']) && isset($_POST['phone'])) {

            if (strlen($_POST['name']) < 2 || strlen($_POST['phone']) < 10 ) {
            $message = 'Il manque des caractères';
            }

            if (empty($message)) {
                $contact = new ContactsModel();
                $contact->setName($_POST['name']);
                $contact->setPhone($_POST['phone']);

                if ($contact->save() != 1) {
                    $message ='Problème de base de données';
                } else {
                    $this->storeMessage('Le contact a bien été ajouté!!');
                    $this->redirect('home');
                }
            }
        }
        echo $this->templates->render('contacts/create', [ 'message' => $message ]);
    }

    // Delete contact
    public function delete() {
        if(isset($_GET['id']) AND !empty($_GET['id'])) {
            $contact = ContactsModel::findById($_GET['id']);
            $contact->delete();
            $message = 'Le contact a bien été supprimé..';
        }
        $this->storeMessage('Le contact a bien été supprimé!!');
        $this->redirect('home');
    }

    // Find one or more contacts
    public static function search() {
        if(isset($_GET['q']) AND !empty($_GET['q'])) {
            $q = htmlspecialchars($_GET['q']);
            $contacts = \Phonebook\Models\ContactsModel::findByNameAndNum($q);
            return $contacts;
        } else {
            $q = Null;
            $contacts = \Phonebook\Models\ContactsModel::findByEmptySearch($q);
            return $contacts;
        }
    echo $this->templates->render('home');
    }

    // Update contact
    public function update() {

        $message = '';
        $contact = ContactsModel::findById($_GET['id']);

        if (empty($contact->getName())) {
          $message = 'Impossible de trouver le contact';
        }

        if (empty($message) && isset($_POST['name']) && isset($_POST['phone'])) {

            if (strlen($_POST['name']) < 2 || strlen($_POST['phone']) < 10 ) {
            $message = 'Il manque des caractères';
            }

            if (empty($message)) {
                $contact->setName($_POST['name']);
                $contact->setPhone($_POST['phone']);
                $contact->update();

                $this->storeMessage('Le contact a bien été modifié!!');
                $this->redirect('home');
            }
        }
        echo $this->templates->render('contacts/update', ['message' => $message, 'contact' => $contact]);
    }

    // Count number of selected contacts
    public static function nbContactsSelected() {
        $total = self::search();
        $selected_contacts = Count($total);
        return $selected_contacts;
        echo $this->templates->render('home');
    }

    // Count number of contact in DB
    public static function nbContactsTotal() {
        $total = \Phonebook\Models\CoreModel::findAll();
        $full_contacts = Count($total);
        return $full_contacts;
        echo $this->templates->render('home');
    }

    // Get search term
    public static function getQ() {
        if(isset($_GET['q'])) {
            $q = htmlspecialchars($_GET['q']);
            return $q;
        }
    }

    // Make sentence to inform how many contacts selected and in DB
    public static function homeSentence() {
        $q = self::getQ();
        $nb_result = self::nbContactsSelected();
        $sentence = "";
        $sentence .= "Vous avez ";
            if(!empty($q)) {
                $sentence .= $nb_result;
                if ($nb_result > 1) {
                    $sentence .= " résultats";
                } else {
                    $sentence .= " résultat";
                }
                $sentence .= " pour (";
                $sentence .= \Phonebook\Controllers\ContactsController::getQ();
                $sentence .= ") parmi vos ";
            }
        $sentence .= \Phonebook\Controllers\ContactsController::nbContactsTotal();
        $sentence .= " contacts dans l'annuaire";
        echo $sentence;
    }
}
