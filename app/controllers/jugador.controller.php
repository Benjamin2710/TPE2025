<?php
require_once './app/models/jugador.model.php';
require_once './app/views/jugador.view.php';
require_once './app/models/club.model.php';
require_once './app/helpers/AuthHelper.php';


class JugadorController {
    private $model;
    private $modelClub;
    private $view;

    public function __construct() {
        AuthHelper::initialize();
        $this->model = new JugadorModel();
        $this->modelClub = new ClubModel();



        $this->view = new JugadorView();
    }

    
    public function showJugador($id) {
        // obtengo las tareas de la DB
        $jugador = $this->model->getJugador($id);

        // mando las tareas a la vista

        /////


        return $this->view->showJugador($jugador);
    }

    public function showJugadores() {
        // obtengo las tareas de la DB
        $jugadores = $this->model->getJugadores();
        $equipos = $this->modelClub->getEquipos();

        // mando las tareas a la vista
        return $this->view->showJugadores($jugadores,$equipos);
    }

    public function addJugador() {
        AuthHelper::verify();
       if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->showError('complete el nombre');
        }
    
        if (!isset($_POST['pais']) || empty($_POST['pais'])) {
            return $this->view->showError('Falta el paisd');
        }
        if (!isset($_POST['posicion']) || empty($_POST['posicion'])) {
            return $this->view->showError('Falta el posicion');
        }
        if (!isset($_POST['fecha_nacimiento']) || empty($_POST['fecha_nacimiento'])) {
            return $this->view->showError('Falta fecha ded nacimiento');
        }
        if (!isset($_POST['puntaje']) || empty($_POST['puntaje'])) {
            return $this->view->showError('Falta puntaje del jugador');
        }
        if (!isset($_POST['id_equipo']) || empty($_POST['id_equipo'])) {
            return $this->view->showError('Falta el el equipo');
        }
       
            
    
        $nombre = $_POST['nombre'];
        $pais = $_POST['pais'];
        $posicion = $_POST['posicion'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $puntaje = $_POST['puntaje'];
        
        $id_equipo = $_POST['id_equipo'];
        
    
        $id = $this->model->insertJugador($nombre, $pais, $posicion, $puntaje, $fecha_nacimiento, $id_equipo);
    
       
        header('Location: ' . BASE_URL . 'jugadores');
    }

    
    public function deleteJugador($id) {
        AuthHelper::verify();
        $jugador = $this->model->getJugador($id) ;
        
        if (empty($jugador)) {
            header('Location: ' . BASE_URL);
            return; 
        }
    
        $this->model->eraseJugador($id);
    
        header('Location: ' . BASE_URL .'jugadores') ;
        
        
        
        
        return ;
    }
    
    
    function showEdit($id){
        AuthHelper::verify();
        $jugador = $this->model->getJugador($id);
        $equipos = $this->modelClub->getEquipo($jugador->id_equipo);

        if(!empty($jugador)) {
        $this->view->showEdit($jugador,$equipos);
        } else {

            
            $this->view->showError('jugador no existe'); // Hay que poner un 4040?
        }
        
    }

    public function editJugador($id) {
    AuthHelper::verify();

    if(isset($_POST['nombre'], $_POST['pais'], $_POST['posicion'], $_POST['fecha_nacimiento'], $_POST['puntaje'], $_POST['id_equipo']) &&
       !empty($_POST['nombre']) && !empty($_POST['pais']) && !empty($_POST['posicion']) && !empty($_POST['fecha_nacimiento']) && !empty($_POST['puntaje']) && !empty($_POST['id_equipo'])) {

        $nombre = $_POST['nombre'];
        $pais = $_POST['pais'];
        $posicion = $_POST['posicion'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $puntaje = $_POST['puntaje']; 
        // equipo
        $id_equipo = $_POST['id_equipo'];

        $this->model->updateJugador($id, $nombre, $pais, $posicion, $puntaje, $fecha_nacimiento, $id_equipo);

        header('Location: ' . BASE_URL .'jugadores');
        exit;
    } else {
        $this->view->showError("Error en los campos, no se pudo guardar");
    }
}


}
