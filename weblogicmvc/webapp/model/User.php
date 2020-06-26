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
    static $validates_format_of = array(
             array('email', 'with' =>
        '/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/'));

    static $validates_size_of = array(
        array('nomecompleto', 'maximum' => 100, 'too_long' => 'should be short and sweet')
        );
}