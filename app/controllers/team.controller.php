<?php
include_once 'app/models/team.model.php';
include_once 'app/view/team.view.php';

class TeamController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new TeamModel();
        $this->view = new TeamView();
    }

    function showTeams() {
        $teams = $this->model->getTeams();
        $this->view->showTeams($teams);
    }

    function addTeam() {
        $nombre = $_POST['Nombre'];
        $ciudad = $_POST['Ciudad'];
        $pais = $_POST['Pais'];
        $liga = $_POST['Liga'];
        $anio = $_POST['Año'];

        $id = $this->model->insertTeam($nombre, $ciudad, $pais, $liga, $anio);

        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError('Error al insertar el registro');
        }
    }

    function editTeam($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['Nombre'];
            $ciudad = $_POST['Ciudad'];
            $pais = $_POST['Pais'];
            $liga = $_POST['Liga'];
            $anio = $_POST['Año'];

            $this->model->updateTeam($id, $nombre, $ciudad, $pais, $liga, $anio);
            header('Location: ' . BASE_URL);
            exit;
        }

        $team = $this->model->getTeamById($id);
        $this->view->editTeam($team);
    }

    function removeTeam($id) {
        $this->model->deleteTeam($id);
        header('Location: ' . BASE_URL);
    }

   
}

