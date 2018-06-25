<?php

namespace Phonebook\Models;

class CoreModel
{

    public static function findAll()
    {
        $conn = \Phonebook\Utils\Database::getDB();
        $sql = 'SELECT * FROM contacts ORDER BY contact_name ASC';
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_CLASS);
        // return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Phonebook\Models\ContactsModel');
    }
}
