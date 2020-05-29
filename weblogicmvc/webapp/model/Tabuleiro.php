<?php


class Tabuleiro
{
    private $dado;
    public $resultadoDado1;
    public $resultadoDado2;
    public $numerosBloqueadosP1;
    public $numerosBloqueadosP2;

    public function __construct(){
        $this->dado= new Dado();
    }
    public function lancarDado(){
        $this->resultadoDado1=$this->dado->lancardado();
        $this->resultadoDado2=$this->dado->lancardado();
    }

    public function checkFinalJogadaP1(/*soma*/){

    }

    public function checkFinalJogadaP2(/*soma*/){

    }

    public function getVencedor(){

    }

    public function getPointsVencedor(){

    }

}