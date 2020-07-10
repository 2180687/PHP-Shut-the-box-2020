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

    //VALIDA APENAS PODE SER INTEGER e O maximo que pode ter é ate 45
    static $validates_numericality_of = array(
        array('pontos', 'only_integer' => true),
        array('pontos', 'less_than_or_equal_to' => 45)
    );



}