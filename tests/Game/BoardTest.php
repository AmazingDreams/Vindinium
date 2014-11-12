<?php

class BoardTest extends PHPUnit_Framework_Testcase {

	public function testReadBoardTiles()
	{
		$std = new stdClass;
		$std->size  = 12;
		$std->tiles = "################################        ############$-            $-########  @1        @4  ######    []  $-$-  []    ####    ##  ####  ##    ####    ##  ####  ##    ####    []  $-$-  []    ######  @2        @3  ########$-            $-############        ################################";

		$board = new \AD9001\Game\Board($std);

		var_dump($board->getTiles());
	}

}
