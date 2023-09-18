<?php

class bdd{
    private $host;
    private $username;
    private $password;
    private $database;
    private $mysql;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect() {
        $this->mysql = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->mysql->connect_error) {
            die("Connexion échouée : " . $this->mysql->connect_error);
        }

        return $this->mysql;
    }

    public function query($req) {
        $result = $this->mysql->query($req);
        return $result;
    }


    public function close() {
        if ($this->mysql) {
            $this->mysql->close();
        }
    }
  
}