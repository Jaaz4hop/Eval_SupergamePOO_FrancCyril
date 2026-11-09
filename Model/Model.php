<?php

class Model{
    //Attribut
    private PDO $bdd;

    //CONSTRUCTEUR
    public function __construct() {
        $this->bdd = new PDO(
            "mysql:host=".$_ENV['dbhost'].";dbname=".$_ENV['dbname'].";charset=utf8",$_ENV['login'],$_ENV['password']);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    //Getter and Setter
    /**
     * Get the value of bdd
     *
     * @return PDO
     */
    public function getBdd(): PDO {
        return $this->bdd;
    }


    //Method
}