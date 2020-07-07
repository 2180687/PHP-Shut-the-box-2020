<?php


class Gameengine
{
public $tabuleiro;
private $estadojogo;


    public function iniciarjogo(){
        $this->tabuleiro= new Tabuleiro();
        //colocar o estado do jogo com um valor inicial. (1)
        $this->estadojogo=1;
    }

    public function getEstadoJogo(){
        //apenas devolve a variavel estado do jogo
        return $this->estadojogo;
    }

    public function updateEstadoJogo( $estadojogo){
        //altera a variavel estadoJogo de acordo com a variavel recebida por parametro
        $this->estadojogo=$estadojogo;
    }


}