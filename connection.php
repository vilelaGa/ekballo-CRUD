<?php


class CONNECTION
{

    public static $instance;
    private static $host = 'localhost';
    private static $db_name = '';
    private static $user = '';
    private static $password = '';

    private function __construct() {
        //
    }

    public static function PDO()
    {
        try {

            if (!isset(self::$instance)) {
                self::$instance = new PDO(
                    'mysql:host=' . self::$host . ';
            dbname=' . self::$db_name,
                    self::$user,
                    self::$password,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
                );
                self::$instance->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
                self::$instance->setAttribute(
                    PDO::ATTR_ORACLE_NULLS,
                    PDO::NULL_EMPTY_STRING
                );
            }

            return self::$instance;
        } catch (PDOException $ex) {
            echo 'ERRO DE CONEXÃO DB: ' . $ex->getMessage();
        }
    }
}
