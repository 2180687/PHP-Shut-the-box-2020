<?php


class User extends ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('username', 'message' => 'Campo obrigatório'),
        array('nomecompleto', 'message' => 'Campo obrigatório'),
        array('email','message' => 'Campo Obrigatório'),
        array('datanascimento','message' => 'Campo Obrigatório'),
        array('password','message' => 'Campo Obrigatório'),
        array('ativacao'),
        array('admin')
    );
}