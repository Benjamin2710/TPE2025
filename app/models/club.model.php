<?php

class ClubModel {

    private $db; // Propiedad para guardar la conexión PDO

    public function __construct() {
        include_once 'config/config.php';
        $conex = new db(); // Instancia de la clase DB
        $this->db = $conex->conexion(); // Método conexión
    }

    // Obtiene los equipos
    public function getEquipos() {
        $query = $this->db->prepare('SELECT * FROM equipos');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ); 
    }

    // Busca por ID
    public function getEquipo($id) {    
        $query = $this->db->prepare('SELECT * FROM equipos WHERE id_equipo = ?');
        $query->execute([$id]);   
        return $query->fetch(PDO::FETCH_OBJ);
    }

    // Inserta nuevo equipo
   public function insertEquipo($nombre, $ciudad, $pais, $liga, $anio) { 
    $query = $this->db->prepare('INSERT INTO equipos(nombre, ciudad, pais, liga, anio) VALUES (?, ?, ?, ?, ?)');
    $query->execute([$nombre, $ciudad, $pais, $liga, $anio]);
    
       
       return $this->db->lastInsertId();
}


   

    // Actualiza
    public function updateEquipo($id, $nombre, $ciudad, $pais, $liga, $anio) {
        $query = $this->db->prepare('UPDATE equipos SET nombre = ?, ciudad = ?, pais = ?, liga = ?, anio = ? WHERE id_equipo = ?');
        $query->execute([$nombre, $ciudad, $pais, $liga, $anio, $id]);
    }

     // Borra, necesita id
    public function eraseEquipo($id) {
        $query = $this->db->prepare('DELETE FROM equipos WHERE id_equipo = ?');
        $query->execute([$id]);
    }

}
