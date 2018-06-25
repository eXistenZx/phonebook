<?php
namespace Phonebook\Models;
use \Phonebook\Utils\Database;

class ContactsModel extends CoreModel
{
    
    protected static $tableName = 'contacts';
    protected static $orderBy = 'contact_name ASC';
    protected $contact_id;
    protected $contact_name;
    protected $contact_phone;
    protected $db;

    public function __construct()
    {
        $this->db = Database::getDB();
    }

    public function save()
    {
        $sql = 'INSERT INTO contacts (contact_name, contact_phone) VALUES (:name, :phone)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $this->contact_name, \PDO::PARAM_STR);
        $stmt->bindValue(':phone', $this->contact_phone, \PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update()
    {
        $sql = 'UPDATE contacts SET contact_name = :name, contact_phone = :phone WHERE contact_id = :id;';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $this->contact_name, \PDO::PARAM_STR);
        $stmt->bindValue(':phone', $this->contact_phone, \PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->contact_id, \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete()
    {
        $sql = 'DELETE FROM contacts WHERE contact_id=:id';
        // $sql = 'DELETE FROM ' . static::$tableName . ' WHERE id=' . $id;
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $this->contact_id, \PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }

    public static function findById($id)
    {
        $db = Database::getDB();
        $sql = 'SELECT * FROM contacts WHERE contact_id = :id';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchObject(__CLASS__);
    }

    public static function findByNameAndNum($q)
    {
        $db = Database::getDB();
        $sql = "SELECT * FROM contacts WHERE contact_name LIKE '%$q%' OR contact_phone LIKE '%$q%' ORDER BY contact_name ASC";
        $contacts = $db->query($sql);
        return $contacts->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function findByEmptySearch($q)
    {
        $db = Database::getDB();
        $sql = "SELECT * FROM contacts WHERE CONCAT(contact_name, contact_phone) LIKE '%$q%' ORDER BY contact_name ASC";
        $contacts = $db->query($sql);
        return $contacts->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->contact_id;
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
        $this->contact_id = $id;
        return $this;
    }
    /**
     * Get the value of Contacts
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->contact_name;
    }
    /**
     * Set the value of Contacts
     *
     * @param mixed contacts
     *
     * @return self
     */
    public function setName($contact)
    {
        $this->contact_name = $contact;
        return $this;
    }
    /**
     * Get the value of Phone
     *
     * @return mixed
     */
    public function getPhone()
    {
        return $this->contact_phone;
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
        $this->contact_phone = $phone;
        return $this;
    }
}
