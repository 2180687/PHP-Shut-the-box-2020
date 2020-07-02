<?php

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

        //quem tiver a soma de desbloqueados menor
    }

    //GUARDA OS PONTOS DO VENCEDOR e ADICIONA 1 VITORIA
    public function getPointsVencedor(){



       // $this->game->$pontos;
/*
        if ($Vencedor==2)
        {
            $pontossoma=$somaP2-$SomaP1;
            $pontos= Post::get('pontos');
            $pontos+=$pontossoma;
            $vitorias=Post::get('Vitorias');
            $vitorias+=1;
            $pontos->save();
            $vitorias->save();

        }
        if ($Vencedor==1)
        {*/
            //subtração dos  desbloqueados (somaNumerosAtivos) do P2 com os desbloqueados (somaNumerosAtivos) do P1

$SomaP2=$this->numerosBloqueadosP2->somaNumerosAtivos();
$SomaP1=$this->numerosBloqueadosP1->somaNumerosAtivos();
            //$Game->$pontos;
            $pontossoma=$SomaP1-$SomaP2;
           // $pontos= Post::get('pontos');
           // $pontos+=$pontossoma;
           // $vitorias=Post::get('Vitorias');
            //$vitorias+=1;
            //new Game()
            $pontuacaojogo = new Game([
                'pontos'
                ]);
            \Tracy\Debugger::barDump($pontossoma);
           // $pontos->save();
            //$vitorias->save();
        }


        //isto só interessa caso o vencecdor seja o jogador humano
        //pontos do vencedor = subtrair a soma dos desbloqueados do PC com a soma dos desbloqueados do humano
        //é estes pontos que deve colocar na Base de Dados (controlador)


}