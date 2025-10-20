<?php

class JugadorModel {

    private $db; // Propiedad para la conexión PDO

    public function __construct() {
        include_once 'config/config.php';
        $conex = new db(); // Instancia de la clase DB
        $this->db = $conex->conexion(); // Guardamos la conexión PDO
    }

    // Obtener todos los jugadores junto con el nombre del equipo
    public function getJugadores() {
        $query = $this->db->prepare('
            SELECT jugadores.*, equipos.nombre AS nombre_club 
            FROM jugadores 
            INNER JOIN equipos ON jugadores.id_equipo = equipos.id_equipo
        ');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // Obtener un jugador por ID
    public function getJugador($id) {
        $query = $this->db->prepare('SELECT jugadores.*, equipos.nombre AS nombre_club FROM jugadores INNER JOIN equipos ON jugadores.id_equipo = equipos.id_equipo WHERE id_jugador = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    // Borrar un jugador por ID
    public function eraseJugador($id) {
        $query = $this->db->prepare('DELETE FROM jugadores WHERE id_jugador = ?');
        $query->execute([$id]);
    }

    // Insertar un nuevo jugador
    public function insertJugador($nombre, $pais, $posicion, $puntaje, $fecha_nacimiento, $id_equipo) {
        $query = $this->db->prepare('INSERT INTO jugadores(nombre, pais, posicion, puntaje, fecha_nacimiento, id_equipo) VALUES (?, ?, ?, ?, ?, ?)');
        $query->execute([$nombre, $pais, $posicion, $puntaje, $fecha_nacimiento, $id_equipo]);
        return $this->db->lastInsertId();
    }

    // Actualizar un jugador existente (necesita recibir el ID)
    public function updateJugador($id, $nombre, $pais, $posicion, $puntaje, $fecha_nacimiento, $id_equipo) {
        $query = $this->db->prepare('UPDATE jugadores SET nombre = ?, pais = ?, posicion = ?, puntaje = ?, fecha_nacimiento = ?, id_equipo = ? WHERE id_jugador = ?');
        $query->execute([$nombre, $pais, $posicion, $puntaje, $fecha_nacimiento, $id_equipo, $id]);
}


    // Obtener jugadores de un equipo específico
    public function getJugadoresConNombreDeEquipoByEquipoId($id_equipo) {
        $query = $this->db->prepare('SELECT jugadores.*, equipos.nombre AS nombre_club FROM jugadores INNER JOIN equipos ON jugadores.id_equipo = equipos.id_equipo WHERE jugadores.id_equipo = ?');
        $query->execute([$id_equipo]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
