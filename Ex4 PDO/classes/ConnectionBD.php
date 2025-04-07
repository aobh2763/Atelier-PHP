<?php

class ConnectionBD {
    private static $_dbname = "studentbd";
    private static $_user = "php";
    private static $_pwd = "phppass";
    private static $_host = "localhost";
    private static $_bdd = null;

    private function __construct() {
        try {
            self::$_bdd = new PDO("mysql:host=" . self::$_host . ";dbname=" . ";charset=utf8", self::$_user, self::$_pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!self::$_bdd) {
            new ConnectionBD();
        }
        return self::$_bdd;
    }
}

?>