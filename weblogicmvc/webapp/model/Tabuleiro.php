<?php


class Tabuleiro
{
    private $dado;
    public $resultadoDado1;
    public $resultadoDado2;
    public $numerosBloqueadosP1;
    public $numerosBloqueadosP2;
    public $soma;
    public $Jogador1;
    public $Jogador2;
    public $Vencedor;

    public function __construct(){
        $this->dado= new Dado();
        $this->Numerosbloqueados= new Numerosbloqueados();
        $this->game=new Game();
    }
    public function lancarDado(){
        $this->resultadoDado1=$this->dado->lancardado();
        $this->resultadoDado2=$this->dado->lancardado();

    }

    public function checkFinalJogadaP1($resultadoDado1,$resultadoDado2)
    {
        $somaP1=$resultadoDado1+$resultadoDado2;

    }

    public function checkFinalJogadaP2($resultadoDado1,$resultadoDado2){
        $somaP2=$resultadoDado1+$resultadoDado2;
    }

    public function getVencedor($Jogador1,$Jogador2,$Vencedor)
    {

        $Jogador1=$this->Numerosbloqueados->somaNumerosAtivos();
        $Jogador2=$this->Numerosbloqueados->somaNumerosAtivos();

        if ($Jogador1>$Jogador2){
            $Vencedor=2;
        }
        else if($Jogador1<$Jogador2){
            $Vencedor=1;
        }
        else
        {
            Echo "<h2>Empate!!</h2>";
        }
        return $Vencedor;

        //quem tiver a soma de desbloqueados menor
    }

    public function getPointsVencedor($Vencedor,$somaP2,$SomaP1){
        public $pontossoma;

        $this->game->$pontos;

        if ($Vencedor==2)
        {
            $pontossoma=$somaP2-$SomaP1;
            $pontos= Post::get('pontos');
            $pontos+=$pontosoma;
            $vitorias=Post::get('Vitorias');
            $vitorias+=1;
            $pontos->save();
            $vitorias->save();

        }
        if ($Vencedor==1)
        {
            $Game->$pontos;
            $pontossoma=$somaP1-$SomaP2;
            $pontos= Post::get('pontos');
            $pontos+=$pontosoma;
            $vitorias=Post::get('Vitorias');
            $vitorias+=1;
            $pontos->save();
            $vitorias->save();
        }


        //isto só interessa caso o vencecdor seja o jogador humano
        //pontos do vencedor = subtrair a soma dos desbloqueados do PC com a soma dos desbloqueados do humano
        //é estes pontos que deve colocar na Base de Dados (controlador)
    }

}