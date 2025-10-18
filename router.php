<?php
require_once 'app/controllers/team.controller.php';
require_once 'app/models/team.model.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);

switch ($params[0]) {
    case 'listar':
        $controller = new TeamController();
        $controller->showTeams();
        break;
    case 'agregar':
        $controller = new TeamController();
        $controller->addTeam();
        break;
    case 'eliminar':
        $controller = new TeamController();
        $controller->removeTeam($params[1]);
        break;
    case 'editar':
        $controller = new TeamController();
        $controller->editTeam($params[1]);
        break;
    case 'jugadores':
        $controller = new TeamController();
        $controller->showPlayers();
        break;
    default: 
        echo "404 Page Not Found";
        break;
}