<?php
require_once './app/models/user.model.php';
require_once './app/views/auth.view.php';
require_once './app/helpers/AuthHelper.php';

class AuthController{
    private $model;
    private $view;
    
    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    function showLogin(){
        $this->view->showLogin();
    }
    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL . 'home');    
    }

    public function login() {
       
        if (!isset($_POST['usuario']) || empty($_POST['usuario'])) {
            return $this->view->showErrorFaltanCampos('Falta el usuario');
        }
    
        else if (!isset($_POST['contrasenia']) || empty($_POST['contrasenia'])) {
            return $this->view->showErrorFaltanCampos('Falta la contraseña');
        }
    
        $usuario = $_POST['usuario'];
        $contrasenia = $_POST['contrasenia'];
    
        $user= $this->model->getUserByUserName($usuario);

        if($user && password_verify($contrasenia, $user->contrasenia)){
            AuthHelper::login($user);
           
            
            header('Location: ' . BASE_URL );
        } else {
            return $this->view->showErrorCredenciales('Credenciales incorrectas');
        }
    }
}