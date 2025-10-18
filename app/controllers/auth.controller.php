<?php
require_once './app/models/user.model.php';
require_once './app/views/auth.view.php';
require_once './app/helpers/AuthHelper.php';

class AuthController {
    private $model;
    private $view;
    
    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL . 'home');    
    }

    public function login() {
        // Validaciones básicas
        if (empty($_POST['usuario'])) {
            return $this->view->showErrorFaltanCampos('Falta completar el nombre de usuario');
        }

        if (empty($_POST['password'])) { // <-- mismo nombre que el campo SQL
            return $this->view->showErrorFaltanCampos('Falta completar la contraseña');
        }

        $usuario = $_POST['usuario'];
        $contrasenia = $_POST['password']; // <-- coincide con el input del formulario

        // Buscar usuario en la base de datos
        $user = $this->model->getUserByUser($usuario);

        // Verificar que existe y que la contraseña sea correcta
        if ($user && password_verify($contrasenia, $user->password)) { // <-- campo correcto
            AuthHelper::login($user);
            header('Location: ' . BASE_URL);
            exit;
        } else {
            return $this->view->showErrorCredenciales('Credenciales incorrectas');
        }
    }
}