<?php

use \AD9001\Game\Tiles\Tile;

class TileTest extends PHPUnit_Framework_Testcase {

	public function testGoldMine()
	{
		$tile = Tile::factory('$', '-', 0, 0);
		$this->assertInstanceOf('AD9001\Game\Tiles\GoldMine', $tile);
	}

	public function testGrass()
	{
		$tile = Tile::factory(' ', ' ', 0, 0);
		$this->assertInstanceOf('AD9001\Game\Tiles\Grass', $tile);
	}

	public function testHero()
	{
		$tile = Tile::factory('@', '1', 0, 0);
		$this->assertInstanceOf('AD9001\Game\Tiles\Hero', $tile);
	}

	public function testTavern()
	{
		$tile = Tile::factory('[', ']', 0, 0);
		$this->assertInstanceOf('AD9001\Game\Tiles\Tavern', $tile);
	}

	public function testWood()
	{
		$tile = Tile::factory('#', '#', 0, 0);
		$this->assertInstanceOf('AD9001\Game\Tiles\Wood', $tile);
	}

}
