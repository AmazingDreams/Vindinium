<?php

class BoardTest extends PHPUnit_Framework_Testcase {

	public function testReadBoardTiles()
	{
		$std = new stdClass;
		$std->size  = 12;
		$std->tiles = "################################        ############$-            $-########  @1        @4  ######    []  $-$-  []    ####    ##  ####  ##    ####    ##  ####  ##    ####    []  $-$-  []    ######  @2        @3  ########$-            $-############        ################################";

		$board  = new \AD9001\Game\Board($std);

		$tiles   = $board->getTiles();
		$heroes  = $board->getHeroes();
		$taverns = $board->getTaverns();
		$woods   = $board->getWoods();
		$grass   = $board->getGrass();

		// COUNT_RECURSIVE also counts the arrays as items of the array
		$this->assertEquals(12 * 12, count($tiles, COUNT_RECURSIVE) - count($tiles));
		$this->assertEquals(4,  count($heroes));
		$this->assertEquals(4,  count($taverns));
		$this->assertEquals(72, count($woods));
		$this->assertEquals(56, count($grass));
	}

}
