<?php

class DB {
    private $host = 'database';
    private $user = 'myuser';
    private $password = 'password';
    private $database = 'htmx';
    private PDO $connection;

    public function connect() {
        $connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }

    public function query($sql) {
        return $this->connect()->query($sql);
    }
}