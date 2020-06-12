<?php


class Game extends ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('id'),
        array('user_id'),
        array('data'),
        array('pontos')
    );

    static $belongs_to = array(
             array('users')
    );
}