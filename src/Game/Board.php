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

	public function getTiles()
	{
		return $this->_tiles;
	}

	public function getWoods()
	{
		return $this->_tilesMapped['woods'];
	}

	public function getGrass()
	{
		return $this->_tilesMapped['grass'];
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

			$i   += 2; // Every tile = 2 characters
			$col += 1; // For every tile we have a column

			if($col >= $this->_size)
			{
				$col  = 0;
				$row += 1;
			}
		}
	}

	private function _mapTile($tile)
	{
		$maps = array(
			'AD9001\Game\Tiles\GoldMine' => 'goldmines',
			'AD9001\Game\Tiles\Grass'    => 'grass',
			'AD9001\Game\Tiles\Hero'     => 'heroes',
			'AD9001\Game\Tiles\Tavern'   => 'taverns',
			'AD9001\Game\Tiles\Wood'     => 'woods',
		);

		$this->_tilesMapped[$maps[get_class($tile)]][] = $tile;
	}

}
