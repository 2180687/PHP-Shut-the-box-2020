<?php
use ArmoredCore\WebObjects\Session;
class Tabuleiro
{
    private $dado;
    public $resultadoDado1;
    public $resultadoDado2;
    public $numerosBloqueadosP1;
    public $numerosBloqueadosP2;
    public $soma;

    public function __construct(){
        $this->dado= new Dado();
        $this->numerosBloqueadosP1 = new Numerosbloqueados();
        $this->numerosBloqueadosP2 = new Numerosbloqueados();
        $this->game=new Game();
    }
    //LANÇA OS DADOS E POE NA VARIAVEL RESULTADODADO1 e RESULTADODADO2
    public function lancarDado(){
        $this->resultadoDado1=$this->dado->lancardado();
        $this->resultadoDado2=$this->dado->lancardado();

    }
    //SOMA O VALOR DOS DADOS DO  JOGADOR 1
    public function checkFinalJogadaP1($resultadoDado1,$resultadoDado2)
    {
        $somaP1=$resultadoDado1+$resultadoDado2;

    }
    //SOMA O VALOR DOS DADOS DO  JOGADOR 2
    public function checkFinalJogadaP2($resultadoDado1,$resultadoDado2){
        $somaP2=$resultadoDado1+$resultadoDado2;
    }

    //VÊ QUEM È O VENCEDOR
    public function getVencedor()
    {

        $jogador1=$this->numerosBloqueadosP1->somaNumerosAtivos();
        $jogador2=$this->numerosBloqueadosP2->somaNumerosAtivos();

        if ($jogador1>$jogador2){
            $vencedor=2;
        }
        else if($jogador1<$jogador2){
            $vencedor=1;
        }
        return $vencedor;

        //quem tiver a soma de desbloqueados menor é o vencedor
    }

    //GUARDA OS PONTOS DO VENCEDOR e ADICIONA 1 VITORIA
    public function getPointsVencedor(){

    //subtração dos  desbloqueados (somaNumerosAtivos) do P2 com os desbloqueados (somaNumerosAtivos) do P1

    $SomaP2=$this->numerosBloqueadosP2->somaNumerosAtivos();
    $SomaP1=$this->numerosBloqueadosP1->somaNumerosAtivos();

            $pontossoma=$SomaP1-$SomaP2;

            $utilizador=Session::get('utilizador');

            $pontuacaojogo = new Game([
                'user_id' => $utilizador->id,
                'data'=> date('Y-m-d'),
                'pontos'=> $pontossoma
                ]);

        if ($pontuacaojogo->is_valid())
        {
            $pontuacaojogo->save();
        }
        return $pontossoma;

    }


}