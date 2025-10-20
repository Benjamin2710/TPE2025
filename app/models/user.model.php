<?php

class UserModel{

    private $db;

    public function __construct () {
        include_once 'config/config.php';
        $conex = new db(); // Instacia de la clase DB
        $this->db = $conex->conexion(); // Metodo conexion.
    } // El constructor crea la conexion a la BD y la guarda en el PDO

    public function getUserByUsername($usuario) {    
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $query->execute([$usuario]);
    
        return $query->fetch(PDO::FETCH_OBJ);
    
    }
}