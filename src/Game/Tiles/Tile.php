<?php

namespace AD9001\Game\Tiles;

class Tile {

	public static function factory($ch1, $ch2, $row, $col)
	{
		$tile;

		switch($ch1)
		{
			case ' ':
				$tile = new Grass();
				break;
			case '#':
				$tile = new Wood();
				break;
			case '@':
				$tile = new Hero($ch2);
				break;
			case '$':
				$tile = new GoldMine($ch2);
				break;
			case '[':
				$tile = new Tavern();
				break;
			default:
				$tile = new Grass();
				break;
		}

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
