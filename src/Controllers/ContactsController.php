<?php

namespace Phonebook\Controllers;

class ContactsController extends CoreController
{

    public function create()
    {
        $message = "";
        // if ( isset($_POST['name']) && isset($_POST['phone']) ) {
        //
        //     $contact = new \Phonebook\Models\ContactsModel();
        //     $contact->setContact($_POST['contact_name']);
        //     $contact->setPhone($_POST['contact_phone']);
        //     $contact->save();
        //     // header('Location: ' . $this->router->generate('home') );
        //     // echo 'OK';
        //     exit();
        // } else {
        //     echo json_encode($errors);
        //     exit();
        //     }
        // echo $this->templates->render('contacts/create', [ 'message' => $message ]);
        echo $this->templates->render('contact/create');
    }


    public function delete() {
        // On récupère l'ID du membre
        // $id = $params['id'];
        $id = $_GET['id'];
        // Appeler la méthode de suppression
        $contact = \Phonebook\Models\ContactsModel::delete_contact($id);
        // $id->delete_contact($id);
        // On redirige vers la liste des communautés
        $this->redirect('home')->with(['message'=>'Contact supprimé!!']);
    }

    // public function contacts_delete($id) {
    //   $contact = \Phonebook\Models\ContactsModel::delete($id);
    //   $id = htmlspecialchars($_GET['id']);
    //   if ($statement->execute([':id' => $id])) {
    //   	// redirect to index.php page
    //   	header("Refresh: 0;url=$router->generate('home');");
    //     echo $this->templates->render('contacts/delete');
    //   }
    // }


    // Permet de rechercher un ou des contacts
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



    // Permet de modifier un contact
    public function update() {

    echo $this->templates->render('contacts/update');
    }


    public static function nbContactsSelected() {
        $total = self::search();
        $selected_contacts = Count($total);
        return $selected_contacts;
        echo $this->templates->render('home');
    }

    public static function nbContactsTotal() {
        $total = \Phonebook\Models\CoreModel::findAll();
        $full_contacts = Count($total);
        return $full_contacts;
        echo $this->templates->render('home');
    }


    public static function getQ() {
        if(isset($_GET['q'])) {
            $q = htmlspecialchars($_GET['q']);
            return $q;
        }
    }

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
