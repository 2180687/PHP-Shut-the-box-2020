<?php


class Numerosbloqueados
{
    private $numerosBloqueados/*TEM QUE SER ARRAY*/;

    /*  Array associativo
     * ['chave' => 'valor', '1' => 'false', '2' => 'true']
     */

    public function iniciar(){
        //é para colocar o array todo a false
    }

    public function bloquearNumero(/*numeroEscolhido, somaDados  Falta COISAS*/){
        //colocar os numeros a true

        //verificar se o numero escolhido é pelo menos menor que a somaDados.
    }


    public function checkFinalJogada(/*somaDados FALTA COISAS*/){

        //consoante os numeros que tenho desbloqueados e a soma dos dados verificar se ainda é possivel jogar.

    }

    public function somaNumerosAtivos(){
        //somar os que estão desbloqueados (portanto os que estão a false)
        //retornar o valor da soma para fora
    }

}