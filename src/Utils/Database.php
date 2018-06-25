<?php
namespace Phonebook\Utils;

class Database
{

    private static $db;
    private static $config;

    public static function setConfig($config)
    {
    self::$config = $config;
    }

    public static function getDB()
    {
    if(!self::$db) {
        try {
            self::$db = new \PDO(
            "mysql:host=" . self::$config['DB_HOST'] . ";dbname=" . self::$config['DB_NAME'].";charset=utf8",
            self::$config['DB_USER'],
            self::$config['DB_PASS']);
        } catch (PDOException $e) {
            die("Erreur en se connectant à la base de donnée: " . $e->getMessage());
        }
    }
    return self::$db;
    }
}
