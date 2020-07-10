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

        Session::set("game", $game);
        return View::make('jogo.play',['jogo' => $game]);
    }

    public function lancarDado(){
        //ler a sessão
        $game=Session::get("game");
        //lançar o dado
        $game->tabuleiro->lancardado();
        Tracy\Debugger::barDump($game);
        Session::set("game", $game);
        //return da view
        return View::make('jogo.play',['jogo' => $game]);//Passar game engine como parametro para todos
    }
    public function terminarjogadaP1(){
        $game=Session::get("game");
        $game->updateEstadoJogo(2);
        Session::set("game", $game);

        return View::make('jogo.play',['jogo' => $game]);
    }

    public function blockNumber2($numero){
        $game=Session::get("game");
        $game->tabuleiro->numerosBloqueadosP2->bloquearNumero($numero);
        Session::set("game", $game);
        return View::make('jogo.play',['jogo' => $game]);

    }

    public function terminarjogo(){
        $game=Session::get("game");
        $game->updateEstadoJogo(3);
        Session::set("game", $game);
        return View::make('jogo.play',['jogo' => $game]);
    }

    public function blockNumber($numero/**,$numerosBloqueados**/){
        $game=Session::get("game");

        $game->tabuleiro->numerosBloqueadosP1->bloquearNumero($numero);
        //$game->tabuleiro->numerosBloqueadosP1->checkFinalJogada($numero,$numerosBloqueados);
        Session::set("game", $game);
        return View::make('jogo.play',['jogo' => $game]);
    }

}