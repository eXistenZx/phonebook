<?php

namespace Phonebook\Models;

class CoreModel
{

    protected static $tableName;

    public static function findAll()
    {
        $conn = \Phonebook\Utils\Database::getDB();
        $sql = 'SELECT * FROM contacts ORDER BY contact_name ASC';
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_CLASS);
        // return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Phonebook\Models\ContactsModel');
    }

    public static function find($id)
    {
        // $id = $this->id;
        // $id = htmlspecialchars($_GET['q']);
        $conn = \Phonebook\Utils\Database::getDB();
        $sql = 'SELECT contact_id FROM ' . static::$tableName . ' WHERE id=' . $id;
        return $conn->exec($sql);
    }


    // public static function delete() {
    //
    //     // $id = $this->id;
    //     $q = htmlspecialchars($_GET['q']);
    //     // On récupère la connexion à la BDD
    //     $conn = \Phonebook\Utils\Database::getDB();
    //
    //   // On construit la requête SQL
    //   $sql = 'DELETE FROM ' . static::$tableName . ' WHERE id=' . $id;
    //
    //   // On exécute la requête
    //   return $conn->exec($sql);
    // }
}
