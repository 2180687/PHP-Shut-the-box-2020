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

    public function register(){
        return view::make('home.register');
    }

    public function registar(){

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

    public function highscores(){
        $pontuacao=Game::find('all',  array('order' => 'pontos desc', 'limit' => 10));

        return View::make('home.highscores',['pontos' => $pontuacao]);
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
    if (is_null($user)) {
        return Redirect::toRoute('home/login');
    }
    if (password_verify($password, $user->password)) {

        if ($user->ativacao == 1) {
            Session::set("utilizador", $user);
        }
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

    public function verifyloginbackoffice()
    {
        $dados=\ArmoredCore\WebObjects\Post::getAll();
        $username=Post::get('username');
        $password=Post::get('password');

        $user= User::find_by_username($username);

        if (password_verify($password, $user->password)) {

            if ($user->ativacao == 1 and $user->admin==1) {
                Session::set("utilizador", $user);

            }
        }
        else{
            return Redirect::toRoute('backoffice/index');
        }
        if($user->admin ==0) {
            return Redirect::toRoute('backoffice/index');
        }
       if (Session::has('utilizador')){
           return Redirect::toRoute('backoffice/index2');
       }

    }

    public function perfil()
    {
        $userAutenticado=Session::get("utilizador");

        $user=User::find($userAutenticado->id);
        if (is_null($user)) {
            // redirect to standard error page
        } else {
            return view::make('home.perfil',['informacao' => $user]);
        }


    }



    public function atualizarperfil() //a imitar o update
    {

        $userAutenticado=Session::get("utilizador");
        //$userAutenticado = vou ler a variavel de sessão do user autenticado

        //$user = vou a bd procurar por aquele userAutenticado
        $user=User::find($userAutenticado->id);
        //ler o form

        $passwordhash = password_hash(Post::get('password'), PASSWORD_DEFAULT);

        $user->nomecompleto = Post::get('nomecompleto');
        $user->email = Post::get('email');
        $user->datanascimento = Post::get('data');
        $user->password= $passwordhash;


        if($user->is_valid()){
            $user->save();
            Redirect::toRoute('home/index');
        } else {
            // return form with data and errors
            Redirect::flashToRoute('home/perfil', ['informacao' => $user], $id);
        }
    }

    public function index2(){
        $registo = User::all();
        return View::make('backoffice.index2',['informacao' => $registo]);
    }

    public function create()
    {
        View::make('backoffice.create');
    }

    /**
     * @return mixed
     */
    public function store()
    {
        // create new resource (activerecord/model) instance
        // your form name fields must match the ones of the table fields
        $registo = new User(Post::getAll());


        if($registo->is_valid()){
            $registo->save();
            Redirect::toRoute('backoffice/index2');
        } else {
            // return form with data and errors
            Redirect::flashToRoute('backoffice/create', ['informacao' => $registo]);
        }
    }

    public function show($id)
    {
        $registo = User::find($id);


        if (is_null($registo)) {
            // redirect to standard error page
        } else {
            View::make('backoffice.show', ['informacao' => $registo]);
        }
    }


    public function editar($id)
    {
        $registo = User::find($id);

        if (is_null($registo)) {
            // redirect to standard error page
        } else {
            View::make('backoffice.editar', ['informacao' => $registo]);
        }
    }

    public function update($id)
    {
        $registo = User::find($id);
        $registo->update_attributes(Post::getAll());

        if($registo->is_valid()){
            $registo->save();
            Redirect::toRoute('backoffice/index2');
        } else {
            // return form with data and errors
            Redirect::flashToRoute('backoffice/editar', ['informacao' => $registo], $id);
        }
    }


    public function destroy($id)
    {
        $registo = User::find($id);
        $registo->delete();
        Redirect::toRoute('backoffice/index2');
    }
}

