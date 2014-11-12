<?php

namespace AD9001\Game\Tiles;

class Tile {

	public static function factory($ch1, $ch2, $row, $col)
	{
		$tile;

		if($ch1 == '#' AND $ch2 == '#')
			$tile = new Wood();
		else if($ch1 == '@')
			$tile = new Hero($ch2);
		else if($ch1 == '$')
			$tile = new GoldMine($ch2);
		else if($ch1 == '['  AND $ch2 == ']')
			$tile = new Tavern();
		else
			$tile = new Grass();

		$tile->setPosition($row, $col);

		return $tile;
	}

	protected $_x;

	protected $_y;

	public function setPosition($x, $y)
	{
		$this->_x = $x;
		$this->_y = $y;
	}

}
