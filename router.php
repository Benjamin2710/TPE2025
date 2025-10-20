<?php
require_once 'app/controllers/jugador.controller.php';
require_once 'app/controllers/home.controller.php';
require_once 'app/controllers/club.controller.php';
require_once 'app/controllers/auth.controller.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; //  por defecto al home
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new HomeController();
        $controller->showHome();
        break;
    case 'jugadores':
        $controller = new JugadorController();
        $controller->showJugadores();
        break;
    case 'viewJugador':
        $controller = new JugadorController;
        $controller->showJugador($params[1]);
        break;
    case 'newJugador':
        
        $controller = new JugadorController();
        $controller->addJugador();
        break;
    case 'deleteJugador':
        
        $controller = new JugadorController();
        $controller->deleteJugador($params[1]);
        break;
    case 'editJugador':
        $controller = new JugadorController();
        $controller->editJugador($params[1]);
        break;
    case 'showEditJugador':    
        $controller = new JugadorController();
        $controller->showEdit($params[1]);
           break;
    case 'equipos':
         $controller = new ClubController();
         $controller->showEquipos();
         break;
    case 'viewEquipo':
        $controller = new ClubController;
        $controller->showEquipo($params[1]);
        break;
     case 'newEquipo':
        
        $controller = new ClubController();
        $controller->addEquipo();
        break;
    case 'deleteEquipo':
        
        $controller = new ClubController();
        $controller->deleteEquipo($params[1]);
         break;
    case 'showEditEquipo':       ////
       
        $controller = new ClubController();
        $controller->showEdit($params[1]);
         break;     
    case 'editEquipo':
        
        $controller = new ClubController();
        $controller->editEquipo($params[1]);
        break;    
     case 'showLogin':
            $controller = new AuthController();
            $controller->showLogin();
            break;
    case 'login':
                $controller = new AuthController();
                $controller->login();
                break;
    case 'logout':
                $controller = new AuthController();
                $controller->logout();
                break;

    default: 
        echo "404 Page Not Found"; 
        break;
}