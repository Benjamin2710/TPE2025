<?php

class JugadorView {
    public function showJugadores($jugadores,$equipos) {
       

        require 'templates/lista_jugadores.phtml';
    }
    public function showJugador($jugador){
        require 'templates/ver_jugadores.phtml';
    }
    public function showEdit($jugador,$equipo){
        require 'templates/editarJugador.phtml';
    }
    public function showError($error) {
        require 'templates/error.phtml';
    }

   
}