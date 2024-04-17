<?php
class Conexion 
{
    public $host = 'localhost';
    public $dbname = 'iglesiaapp';
    public $port = "5433";
    public $username = 'postgres';
    public $password = 'Neji021019';
    public $connect;

    public static function getConnection()
    {
        try {
            $connection = new Conexion();
            $connection -> connect = new PDO("pgsql:host={$connection->host};port={$connection->port};
            dbname={$connection->dbname}", $connection->username, $connection->password);
            $connection->connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $connection->connect;
            //echo "connection succes";
        } catch (PDOException $e) {
            echo "ERROR: " . $e-> getMessage();
        }
    }
}
Conexion::getConnection();