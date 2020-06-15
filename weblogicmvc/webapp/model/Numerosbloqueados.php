<?php


class Numerosbloqueados
{
    private $numerosBloqueados/*TEM QUE SER ARRAY*/
    $numerosBloqueados = array("1" => "False", "2" => "false", "3" => "false", "4" => "false", "5" => "false", "6" => "false",
    "7" => "false", "8" => "false", "9" => "false");

    /*  Array associativo
     * ['chave' => 'valor', '1' => 'false', '2' => 'true']
     */

        public function __construct(){
            $this->tabuleiro= new Tabuleiro();
        }


    public function iniciar($numerosBloqueados)
    {
        $numerosBloqueados = array("1"=>false, "2"=>false, "3"=>false,"4"=>false,"5"=>false,"6"=>false,
    "7"=>false,"8"=>false,"9"=>false);
        //é para colocar o array todo a false
    }

    public function bloquearNumero($numeroEscolhido,$somaDados){
        //colocar os numeros a true
        $somaDados=$this->tabuleiro->resultadoDado1+$this->tabuleiro->resultadoDado2;
        public $numeroEscolhido;

        if ($somaDados<$numeroEscolhido)
        {
            echo "Jogada Invalida o numero escolhido é maior que o total da soma dos dados";
        }
        if ($somaDados>$numeroEscolhido)
        {
            echo "Jogada Invalida o numero tem que ter o mesmo valor que o numero dos dados";
        }
        else {
            $numerosBloqueados[$numeroEscolhido] = true;
        }


    }


    public function checkFinalJogada($somaDados,$numerosBloqueados)
    {
        public $Jogador1;
        public $Jogador2;

        if ($Jogador1==true) {
            if ($somaDados > $numerosBloqueados) {
                $this->somaNumerosAtivos();
            }
            else
                {
                    $this->tabuleiro->checkFinalJogadaP1();
                }

        if ($Jogador2==true)
            if ($somaDados > $numerosBloqueados)
            {
                $this->somaNumerosAtivos();
            }
            else
                {
                    $this->tabuleiro->numerosBloqueadosP2();
                }
            //consoante os numeros que tenho desbloqueados e a soma dos dados verificar se ainda é possivel jogar.

        }

    }

    public function somaNumerosAtivos($numerosBloqueados)
    {
        $public soma;
        if ($numerosBloqueados==false)
        {
            $soma=$numerosBloqueados;
        }

        return $soma;
        //somar os que estão desbloqueados (portanto os que estão a false)
        //retornar o valor da soma para fora
    }

}