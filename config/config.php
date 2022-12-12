<?php


class Connection{


    public function connect(){

        try {
            $connection = new PDO("mysql:host=localhost;dbname=cats_php", "root", "");
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->exec("SET CHARACTER SET UTF8");

        } catch (Exception $e) {
            die("Error" . $e->getMessage());
            echo ("There is an error on line" . $e->getLine());
        }
        return $connection;
    }
}


