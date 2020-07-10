<?php


class Game extends ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('user_id'),
        array('data'),
        array('pontos')
    );

    static $belongs_to = array(
             array('users')
    );

    //VALIDA O LIMITE DE PONTOS PARA 45
    static $validates_size_of = array(
        array('pontos', 'maximum' => 45, 'Max points' => 'The max points you can have is 45')
    );
}