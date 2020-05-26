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

Router::get('backoffice/','Homecontroller/backoffice');
Router::get('backoffice/index2','Homecontroller/index2');










/************** End of URLEncoder Routing Rules ************************************/