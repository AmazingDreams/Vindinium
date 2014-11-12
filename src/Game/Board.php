<?php

namespace AD9001\Game;

use \AD9001\Game\Tiles\Tile;

class Board {

	private $_size;

	private $_tiles;

	private $_tilesMapped;

	public function __construct($board)
	{
		$this->setSize($board->size);
		$this->readTiles($board->tiles);

		var_dump($this->_tiles);
	}

	public function getHeroes()
	{
		return $this->_tilesMapped['heroes'];
	}

	public function getTaverns()
	{
		return $this->_tilesMapped['taverns'];
	}

	public function getGoldMines()
	{
		return $this->_tilesMapped['goldmines'];
	}

	public function setSize($size)
	{
		$this->_size = $size;
	}

	public function readTiles($str)
	{
		$this->_tiles = array();
		$this->_tilesMapped = array();

		$length = strlen($str);

		$row = 0;
		$col = 0;
		$i   = 0;

		while($i < $length)
		{
			$ch1 = $str[$i];
			$ch2 = $str[$i + 1];

			$tile = Tile::factory($ch1, $ch2, $row, $col);
			$this->_mapTile($tile);

			$this->_tiles[$row][$col] = $tile;

			$i   += 2;
			$col += 1;

			if($col >= $this->_size)
			{
				$col  = 0;
				$row += 1;
			}
		}
	}

	private function _mapTile($tile)
	{
		if ($tile instanceof Hero)
			$this->_tilesMapped['heroes'] = $tile;
		else if ($tile instanceof GoldMine)
			$this->_tilesMapped['goldmines'] = $tile;
		else if ($tile instanceof Tavern)
			$this->_tilesMapped['taverns'] = $tile;
	}

}
