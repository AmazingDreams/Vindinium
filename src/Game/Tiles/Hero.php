<?php

namespace AD9001\Game\Tiles;


/**
 * Created by PhpStorm.
 * User: Athos
 * Date: 12-11-2014
 * Time: 13:36
 */

class Hero extends Tile {

    private $_id;

    private $_lastDirection;

    private $_life;

    private $_gold;

    private $_mineCount;

    private $_isDead;

    private $_isOurs;

    public function __construct($id)
    {
        $this->_id = $id;
    }

}
