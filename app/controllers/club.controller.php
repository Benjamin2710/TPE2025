<?php
require_once './app/models/club.model.php';
require_once './app/views/club.view.php';
require_once './app/helpers/AuthHelper.php';

class ClubController {
    private $model;
    private $view;
    private $modelJugador;

    public function __construct() {
        AuthHelper::initialize();
        
        $this->model = new ClubModel();
        $this->view = new ClubView();
        $this->modelJugador = new JugadorModel();
    }

    public function showEquipos() {
        // obtengo las tareas de la DB
        $equipos = $this->model->getEquipos();

        // mando las tareas a la vista
        return $this->view->showEquipos($equipos);
    }
    public function showEquipo($id) {
        // obtengo las tareas de la DB
        $equipo = $this->model->getEquipo($id);

        if(!empty($equipo)) {
            $jugadores=$this->modelJugador->getJugadoresConNombreDeEquipoByequipoId($id);
            $this->view->showEquipo($equipo, $jugadores);
        }
    }

    public function addEquipo() {
        AuthHelper::verify();
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->showError('Falta nombre del club');
        }
       
    
        $nombre = $_POST['nombre'];
        $ciudad= $_POST['ciudad'];
        $pais=$_POST['pais'];
        $liga= $_POST['liga'];
        $anio = $_POST['anio'];
    
        $id = $this->model->insertEquipo($nombre, $ciudad, $pais, $liga, $anio);
    
       


        header('Location: ' . BASE_URL .'equipos');
    }

    
    public function deleteEquipo($id) {
        AuthHelper::verify();
        $equipo = $this->model->getEquipo($id);
        
       if (empty($equipo)) {
            header('Location: ' . BASE_URL .'equipos');
            return;
        }
    
       $this->model->eraseEquipo($id);
        header('Location: ' . BASE_URL .'equipos');
        return; // 
    }
    

    
    function showEdit($id){
        AuthHelper::verify();
        $equipo = $this->model->getEquipo($id);
        if(!empty($equipo)) {
        $this->view->showEdit($equipo);
        } else {
            $this->view->showError('error');
        }
    }



    public function editEquipo($id) {
    AuthHelper::verify();

    if(isset($_POST['nombre'], $_POST['ciudad'], $_POST['pais'], $_POST['liga'], $_POST['anio']) &&
       !empty($_POST['nombre']) && !empty($_POST['ciudad']) && !empty($_POST['pais']) && !empty($_POST['liga']) && !empty($_POST['anio'])) {

        $nombre = $_POST['nombre'];
        $ciudad = $_POST['ciudad'];
        $pais = $_POST['pais'];
        $liga = $_POST['liga'];
        $anio = $_POST['anio'];

        $this->model->updateEquipo($id, $nombre, $ciudad, $pais, $liga, $anio);

        header('Location: ' . BASE_URL .'equipos');
        exit;
    } else {
        $this->view->showError('Campos erróneos o incompletos');
    }
}

}