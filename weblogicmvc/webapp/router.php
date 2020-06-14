<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 02-05-2016
 * Time: 11:18
 */
use ArmoredCore\Facades\Router;

/****************************************************************************
 *  URLEncoder/HTTPRouter Routing Rules
 *  Use convention: controllerName@methodActionName
 ****************************************************************************/

Router::get('/',			'HomeController/index');
Router::get('home/',		'HomeController/index');
Router::get('home/index',	'HomeController/index');
Router::get('home/start',	'HomeController/start');
Router::get('home/highscores','HomeController/highscores');
Router::get('home/register','HomeController/register');
Router::get('home/login','HomeController/login');

Router::get('home/logout','HomeController/logout');

Router::post('home/registar', 'HomeController/registar');
Router::post('home/verifylogin','HomeController/verifylogin');
Router::get('home/perfil','HomeController/perfil');
Router::post('home/perfil','HomeController/atualizarperfil');

Router::get('backoffice/index','HomeController/backoffice');
Router::post('backoffice/index','HomeController/verifyloginbackoffice');
Router::get('backoffice/index2','HomeController/index2');
Router::get('backoffice/show','HomeController/show');

Router::get('backoffice/editar','HomeController/editar');
Router::post('backoffice/editar','HomeController/update');
Router::get('backoffice/destroy','Homecontroller/destroy');

Router::get('jogo/play','GameController/game');
Router::post('jogo/play2','GameController/mandardados');










/************** End of URLEncoder Routing Rules ************************************/