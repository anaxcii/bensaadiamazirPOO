<?php
abstract class DbManager{
    protected $bdd;
    private $dbName = 'motoshop';
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';

    public function __construct(){
        try {
            $this->bdd = new PDO("mysql:dbname=".$this->dbName.";host=".$this->host,$this->user,$this->password);
        } catch (PDOException $e){
            throw $e;
        }
    }
}