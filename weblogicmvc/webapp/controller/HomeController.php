<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Post;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 09-05-2016
 * Time: 11:30
 */
class HomeController extends BaseController
{

    public function index(){

        return View::make('home.index');
    }

    public function start(){

        //View::attachSubView('titlecontainer', 'layout.pagetitle', ['title' => 'Quick Start']);
        return View::make('home.start');
    }

    public function worksheet(){

        View::attachSubView('titlecontainer', 'layout.pagetitle', ['title' => 'MVC Worksheet']);

        return View::make('home.worksheet');
    }

    public function setsession(){
        $dataObject = MetaArmCoreModel::getComponents();
        Session::set('object', $dataObject);

        Redirect::toRoute('home.worksheet');
    }

    public function showsession(){
        $res = Session::get('object');
        var_dump($res);
    }

    public function destroysession(){

        Session::destroy();
        Redirect::toRoute('home.worksheet');
    }
    public function highscores(){
        return view::make('home.highscores');
    }

    public function register(){
        return view::make('home.register');
    }

    public function registar(){
        \Tracy\Debugger::barDump(Post::getAll());
        $passwordhash = password_hash(Post::get('password'), PASSWORD_DEFAULT);
        $registo = new User([
            'username' => Post::get('username'),
            'nomecompleto'=>Post::get('nomecompleto'),
            'email'=>Post::get('email'),
            'datanascimento' => Post::get('data'),
            'password' => $passwordhash
        ]);
        if ($registo->is_valid())
        {
            $registo->save();
            Redirect::toRoute('home/login');
        }else {
            Redirect::flashToRoute('home/register', ['informacao' => $registo]);
        }
    }


    public function login(){
        return view::make('home.login');
    }


    public function verifylogin()
    {
    $dados=\ArmoredCore\WebObjects\Post::getAll();
    $username=Post::get('username');
    $password=Post::get('password');

    $user= User::find_by_username($username);

    if (password_verify($password, $user->password)) {

        if ($user->ativacao == 1) {
            Session::set("utilizador", $user);
            \Tracy\Debugger::barDump(Session::get('utilizador'));
        }
    } else  {
        //DAVA ERRO PELA PASSWORD SER DIFERENTE
        }
    return Redirect::toRoute('home/index');

    }

    public function logout(){
       Session::destroy("utilizador");
        Redirect::toRoute('home/index');

    }

    public function backoffice(){
        return view::make('backoffice.index');
    }

    public function index2(){
        $registo = User::all();
        return View::make('backoffice.index2',['informacao' => $registo]);
    }

}