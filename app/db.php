<?php

function getConnection() {
    return new PDO('mysql:host=localhost;dbname=tpe_2025;charset=utf8', 'root', '');
}

/**
 * Obtiene y devuelve todas las filas de la tabla equipos.
 */
function getTeams() {
    $db = getConnection();

    $query = $db->prepare('SELECT * FROM equipos');
    $query->execute();

    return $query->fetchAll(PDO::FETCH_OBJ);
}

/**
 * Inserta un registro en la tabla equipos.
 */
function insertTeam($nombre, $ciudad, $pais, $liga, $anio) {
    $db = getConnection();

    $query = $db->prepare('INSERT INTO equipos (nombre, ciudad, pais, liga, anio) VALUES (?, ?, ?, ?, ?)');
    $query->execute([$nombre, $ciudad, $pais, $liga, $anio]);

    return $db->lastInsertId();
}

/**
 * Elimina un registro de la tabla equipos por id_equipo.
 */
function deleteTeam($id) {
    $db = getConnection();

    $query = $db->prepare('DELETE FROM equipos WHERE id_equipo = ?');
    $query->execute([$id]);
}

/**
 * Actualiza un registro de la tabla equipos por id_equipo.
 */
function updateTeam($id, $nombre, $ciudad, $pais, $liga, $anio) {
    $db = getConnection();

    $query = $db->prepare('UPDATE equipos SET nombre = ?, ciudad = ?, pais = ?, liga = ?, anio = ? WHERE id_equipo = ?');
    $query->execute([$nombre, $ciudad, $pais, $liga, $anio, $id]);
}
