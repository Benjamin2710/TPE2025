<?php
require_once './app/models/jugadores.model.php';
require_once './app/views/jugadores.view.php';
require_once './app/models/club.model.php';
require_once './app/helpers/AuthHelper.php';

class JugadorController{
    private $model;
    private $clubModel;
    private $view;

    public function __construct() {
        AuthHelper::initialize();
        $this->model = new JugadorModel();
        $this->clubModel = new ClubModel();
        $this->view = new JugadorView();
    }

    public function showJugadores(){ //obtengo de db
        $jugadores = $this->model->getJugadores();
        //$clubs = $this->clubModel->getClubs();

         // mando las tareas a la vista
        return $this->view->showJugadores($jugadores,$clubs); //arreglar clubs

    }
    public function showJugador($id_jugador) {
        // obtengo las tareas de la DB
        $jugador = $this->model->getJugador($id_jugador);

        // mando las tareas a la vista
        return $this->view->showJugador($jugador);
    }

    public function addJugador() {
        AuthHelper::verify();
       if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->showError('Falta completar el nombre');
        }
         if (!isset($_POST['apellido']) || empty($_POST['apellido'])) {
            return $this->view->showError('Falta completar el nombre');
        }
    
        if (!isset($_POST['pais']) || empty($_POST['pais'])) {
            return $this->view->showError('Falta completar el pais de origen');
        }
        if (!isset($_POST['posicion']) || empty($_POST['posicion'])) {
            return $this->view->showError('Falta la posicion');
        }
        if (!isset($_POST['fecha']) || empty($_POST['fecha'])) {
            return $this->view->showError('Falta completar la fecha de nacimiento');
        }
        if (!isset($_POST['altura']) || empty($_POST['altura'])) {
            return $this->view->showError('Falta completar altura');
        }
        if (!isset($_POST['puntaje']) || empty($_POST['puntaje'])) {
            return $this->view->showError('Falta completar puntaje del jugador');
        }
        if (!isset($_POST['id_equipo']) || empty($_POST['id_equipo'])) {
            return $this->view->showError('Falta completar el club');
        }
       
            
    
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $pais = $_POST['pais'];
        $posicion = $_POST['posicion'];
        $fecha = $_POST['fecha'];
        $altura = $_POST['altura'];
        $puntaje = $_POST['puntaje'];


        
        $id_equipo = $_POST['id_equipo'];
        
    
        $id = $this->model->insertJugador($nombre, $apellido, $pais, $posicion, $fecha, $altura, $puntaje, $id_equipo);
    
        // redirijo al home, hay que avisar que se guardo?? 
        header('Location: ' . BASE_URL . 'jugadores');
    }
    
    public function deleteJugador($id_jugador) {
        AuthHelper::verify();
        // obtengo por id
        $jugador = $this->model->getJugador($id_jugador);
        
        // si no existe, redirijo a la lista de jugadores
        if (empty($jugador)) {
            header('Location: ' . BASE_URL);
            return; // retorno para salir de la función
        }
    
        // borro el jugador
        $this->model->eraseJugador($id_jugador);
    
        // redirijo a la lista de jugadores
        header('Location: ' . BASE_URL .'jugadores') ;
        return; // retorno para finalizar la ejecución de la función
    }

    public function editJugador($id_jugador) {
        AuthHelper::verify();
        if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['pais']) &&  isset($_POST['posicion'])  &&  isset($_POST['fecha']) &&
            isset($_POST['altura']) && isset($_POST['puntaje']) && isset($_POST['id_equipo']) &&
        !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['pais']) && !empty($_POST['posicion'])  && !empty($_POST['fecha'])
        && !empty($_POST['altura']) && !empty($_POST['puntaje']) && !empty($_POST['id_equipo'])){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $pais = $_POST['pais'];
            $posicion = $_POST['posicion'];
            $fecha = $_POST['fecha'];
            $altura = $_POST['altura'];
            $puntaje = $_POST['puntaje'];

            $this->model->updateJugador($id_jugador,$nombre, $apellido, $pais, $posicion, $fecha, $altura, $puntaje, $id_equipo);
        } else {
            $this->view->showError("Error al editar Jugador");
        }
           header('Location: ' . BASE_URL .'jugadores') ;
    }

    function showEdit($id_jugador){
        AuthHelper::verify();
        $jugador = $this->model->getJugadorr($id_jugador);
        $clubs = $this->clubModel->getClubs();

        if(!empty($jugador)) {
        $this->view->showEdit($jugador,$equipo);
        } else {
            $this->view->showError('jugador o club no enconrado');
        }
        
    }


}
