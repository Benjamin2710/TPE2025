<?php

class TeamModel {

    // CONEXIÓN
    private function connect() {
        $db = new PDO('mysql:host=localhost;dbname=tpe_2025;charset=utf8', 'root', '');
        return $db;
    }

    // OBTENER
    function getTeams() {
        $db = $this->connect();
        $query = $db->prepare('SELECT * FROM equipos');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // INSERTAR NUEVO EQUIPO
    function insertTeam($nombre, $ciudad, $pais, $liga, $anio) {
        $db = $this->connect();
        $query = $db->prepare('INSERT INTO equipos (nombre, ciudad, pais, liga, anio) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$nombre, $ciudad, $pais, $liga, $anio]);
        return $db->lastInsertId();
    }

    // BORRAR 
    function deleteTeam($id) {
        $db = $this->connect();
        $query = $db->prepare('DELETE FROM equipos WHERE id_equipo = ?');
        $query->execute([$id]);
    }

    // OBTENER EQUIPOS (EDITAR)
    function getTeamById($id) {
        $db = $this->connect();
        $query = $db->prepare('SELECT * FROM equipos WHERE id_equipo = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    // ACTUALIZAR EQUIPO
    function updateTeam($id, $nombre, $ciudad, $pais, $liga, $anio) {
        $db = $this->connect();
        $query = $db->prepare('UPDATE equipos SET nombre = ?, ciudad = ?, pais = ?, liga = ?, anio = ? WHERE id_equipo = ?');
        $query->execute([$nombre, $ciudad, $pais, $liga, $anio, $id]);
    }

    // OBTENER TODOS LOS JUGADORES
    function getPlayers() {
        $db = $this->connect();
        $query = $db->prepare('SELECT * FROM jugadores');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}
