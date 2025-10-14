<?php
require_once 'app/tasks.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);

switch ($params[0]) {
    case 'listar':
        showTeams();
        break;
    case 'agregar':
        addTeam();
        break;
    case 'eliminar':
        removeTeam($params[1]);
        break;
    case 'editar':
        editTeam($params[1]);
        break;
    case 'jugadores':
        showPlayers();
        break;
    default: 
        echo "404 Page Not Found";
        break;
}