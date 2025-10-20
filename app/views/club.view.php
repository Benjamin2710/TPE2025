<?php

class ClubView {
    public function showEquipos($equipos) {
        // la vista define una nueva variable con la cantida de tareas
        




        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion
        require 'templates/lista_equipos.phtml';
    }
    public function showEquipo($equipo,$jugadores){
        require 'templates/ver_equipos.phtml';
    }
    public function showEdit($equipo){
        require 'templates/editarEquipo.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }

   
}