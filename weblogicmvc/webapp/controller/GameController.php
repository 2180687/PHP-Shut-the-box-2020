<?php

use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Asset;

class GameController
{

    public function game()
    {
        //iniciar o jogo
        $game = new Gameengine();
        $game->iniciarjogo();
        $game->tabuleiro->lancardado();
        //$numeros=[5,7];
        //$teste = $game->tabuleiro->numerosBloqueadosP2->bloquearNumero($numeros, 12);
        //\Tracy\Debugger::barDump($teste);
        //Post::getAll();
        Session::set("game", $game);
        return View::make('jogo.play');
    }

    //isto implica fazer uma rota e configurar o form como deve de ser
    public function lancarDado(){
        //ler a sessão
        $game=Session::get("game");
        //lançar o dado
        $game->tabuleiro->lancardado();
        Tracy\Debugger::barDump($game);
        Session::set("game", $game);
        //return da view
        return View::make('jogo.play');//Passar game engine como parametro para todos
    }
    public function terminarjogadaP1(){
        $game=Session::get("game");
        $game->updateEstadoJogo(2);
        Session::set("game", $game);
        return View::make('jogo.play');
    }

    public function blockNumber2($numero){
        $game=Session::get("game");
        $game->tabuleiro->numerosBloqueadosP2->bloquearNumero($numero);
        Session::set("game", $game);
        return View::make('jogo.play');

    }

    public function terminarjogo(){
        $game=Session::get("game");
        $game->updateEstadoJogo(3);
        Session::set("game", $game);
        return View::make('jogo.play');
    }
    public function blockNumber($numero){
        $jogosessao=Session::get("game");


        //\Tracy\Debugger::barDump($jogosessao->tabuleiro->numerosBloqueadosP1->somaNumerosAtivos(), 'somaNumerosAtivos');

      //  $somaDados = $jogosessao->tabuleiro->resultadoDado1+$jogosessao->tabuleiro->resultadoDado2;

        $jogosessao->tabuleiro->numerosBloqueadosP1->bloquearNumero($numero);
        //\Tracy\Debugger::barDump($teste);
        //$teste2= $jogosessao->tabuleiro->getPointsVencedor();

      //  \Tracy\Debugger::bardump($teste2);
        return View::make('jogo.play');
    }

}