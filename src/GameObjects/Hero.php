<?php
/**
 * Created by PhpStorm.
 * User: Athos
 * Date: 12-11-2014
 * Time: 13:36
 */

class Hero {

    private $_id;

    private $_currentPosition;

    private $_lastDirection;

    private $_life;

    private $_gold;

    private $_mineCount;

    private $_isDead;

    private $_isOurs;

    public function __construct($id, $isOurs)
    {
        $this->_id = $id;
        $this->_isOurs = $isOurs;
    }

    public function setPosition($newPosition)
    {
        $this->_currentPosition = $newPosition;
    }
} 