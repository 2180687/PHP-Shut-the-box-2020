<?php

use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Asset;

class GameController
{

public function game(){
    $game= new Gameengine();
    $game->tabuleiro->lancardado();
    //Post::get('nomedaCheckbox')
    Session::set("game",$game);
    return View::make('jogo.play');
}

}