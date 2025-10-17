<?php
require_once './app/models/Model.php';
class JugadorModel extends Model{

   function getJugadores() {
        $query = $this->db->prepare('
            SELECT jugadores.*, equipos.nombre AS nombre_equipo
            FROM jugadores
            INNER JOIN equipos ON jugadores.id_equipo = equipos.id_equipo
        ');
        $query->execute();

        $jugadores = $query->fetchAll(PDO::FETCH_OBJ);
        return $jugadores;

    
    } 
    function getJugador($id_jugador) {
        $query = $this->db->prepare('
            SELECT jugadores.*, equipos.nombre AS nombre_equipo
            FROM jugadores
            INNER JOIN equipos ON jugadores.id_equipo = equipos.id_equipo
            WHERE jugadores.id_jugador = ?
        ');
        $query->execute([$id_jugador]);

        $jugador = $query->fetch(PDO::FETCH_OBJ);
        return $jugador;
    }
    public function insertJugador($nombre, $apellido, $pais, $posicion, $puntaje, $altura, $numero, $fecha_nacimiento, $id_equipo) {
        $query = $this->db->prepare('
            INSERT INTO jugadores (nombre, apellido, pais, posicion, puntaje, altura, numero, fecha_nacimiento, id_equipo)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');
        $query->execute([$nombre, $apellido, $pais, $posicion, $puntaje, $altura, $numero, $fecha_nacimiento, $id_equipo]);

        $id = $this->db->lastInsertId();
        return $id;
    }

    public function eraseJugador($id) {
        $query = $this->db->prepare('DELETE FROM jugadores WHERE id_jugador = ?');
        $query->execute([$id]);
    }

    public function updateJugador($id, $nombre, $apellido, $pais, $posicion, $puntaje, $altura, $numero, $fecha_nacimiento, $id_equipo) {
        $query = $this->db->prepare('
            UPDATE jugadores 
            SET nombre = ?, apellido = ?, pais = ?, posicion = ?, puntaje = ?, altura = ?, numero = ?, fecha_nacimiento = ?, id_equipo = ?
            WHERE id_jugador = ?
        ');
        $query->execute([$nombre, $apellido, $pais, $posicion, $puntaje, $altura, $numero, $fecha_nacimiento, $id_equipo, $id]);
    }

    




    


}