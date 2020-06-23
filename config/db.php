<?php


namespace Config;

class Db
{
    public  static function conexao()

    {
        $host =getenv('HOST');
        $dbname = getenv('DBNAME');
        $user = getenv('USER');
        $pass = getenv('PASSWORD');

        try {
            $pdo = new \PDO("mysql:host={$host};dbname={$dbname}", $user, $pass);
            return $pdo;
        } catch (\PDOException $error) {

            return $error->getMessage();
        }
    }
}
