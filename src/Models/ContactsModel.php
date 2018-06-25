<?php

namespace Phonebook\Models;

class ContactsModel extends CoreModel
{

    protected static $tableName = 'contacts';
    protected static $orderBy = 'contact_name ASC';

    protected $id;
    protected $contact;
    protected $phone;

    public function save()
    {
        $conn = \Phonebook\Utils\Database::getDB();
        $sql = 'INSERT INTO contacts (contact_name, contact_phone) VALUES (:name, :phone)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':name', $this->name, \PDO::PARAM_STR);
        $stmt->bindValue(':phone', $this->phone, \PDO::PARAM_STR);

        $error = $stmt->execute();
    }



    // $message = '';
    //
    // if ( isset($_POST['name']) && isset($_POST['phone']) ) {
    // 	$name = $_POST['name'];
    // 	$phone = $_POST['phone'];
    // 	$sql = 'INSERT INTO contacts(contact_name, contact_phone) VALUES (:name, :phone)';
    // 	$statement = $db_connect->prepare($sql);
    //
    // 	if ($statement->execute(array(
    // 		':name' => $name,
    // 		':phone' 	=> $phone
    // 		)))
    // 		{
    // 		$message = 'Contact ajouté';
    // 		header("Refresh: 0.5; url=index.php");
    // 	}
    // }





    public static function findByNameAndNum($q)
    {
        $conn = \Phonebook\Utils\Database::getDB();
        $sql = "SELECT * FROM contacts WHERE contact_name LIKE '%$q%' OR contact_phone LIKE '%$q%' ORDER BY contact_name ASC";
        $contacts = $conn->query($sql);

        return $contacts->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function findByEmptySearch($q)
    {
        $conn = \Phonebook\Utils\Database::getDB();
        $sql = "SELECT * FROM contacts WHERE CONCAT(contact_name, contact_phone) LIKE '%$q%' ORDER BY contact_name ASC";
        $contacts = $conn->query($sql);

        return $contacts->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Supprime le contact en BDD
    public static function delete_contact($id)
    {
        // $id = $this->id;
        // $id = $_GET['id'];
        $conn = \Phonebook\Utils\Database::getDB();

        $sql = 'DELETE FROM contacts WHERE id=:id';
        // $sql = 'DELETE FROM ' . static::$tableName . ' WHERE id=' . $id;
        $stmt = $conn->prepare($sql);
        if ($stmt->execute([':id' => $id])) {
        // On exécute la requête
        // return;
        // $conn->exec($sql);
      }
    }


    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Contacts
     *
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set the value of Contacts
     *
     * @param mixed contacts
     *
     * @return self
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get the value of Phone
     *
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of Phone
     *
     * @param mixed phone
     *
     * @return self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

}
