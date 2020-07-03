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
        Session::get("game");
        //lançar o dado
        $game = new Gameengine();
        $game->tabuleiro->lancardado();
        //return da view
        return View::make('jogo.play');
    }

    public function blockNumber(){
        $jogosessao=Session::get("game");
        \Tracy\Debugger::barDump(Post::getAll());
        $numeros = array_values(Post::getAll());
        \Tracy\Debugger::barDump($numeros);

        \Tracy\Debugger::barDump($jogosessao->tabuleiro->numerosBloqueadosP1->somaNumerosAtivos(), 'somaNumerosAtivos');

        $somaDados = $jogosessao->tabuleiro->resultadoDado1+$jogosessao->tabuleiro->resultadoDado2;

        $teste = $jogosessao->tabuleiro->numerosBloqueadosP1->bloquearNumero($numeros, $somaDados);
        \Tracy\Debugger::barDump($teste);
        $teste2= $jogosessao->tabuleiro->getPointsVencedor();
        \Tracy\Debugger::bardump($teste2);
        return View::make('jogo.play');
    }

}