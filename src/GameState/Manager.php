<?php

namespace AD9001\GameState;

use \AD9001\Game\Board;
use \AD9001\Game\Game;
use \AD9001\Netcode\Api as API;

class Manager {

	private $_api;

	public function __construct(API $api)
	{
		$this->_api = $api;
	}

	public function go($gameType)
	{
		$response = $this->_api->start($gameType);
		$content  = $response->getContent();

		$game  = new Game($content->game);
		$board = new Board($content->game->board);
	}

}
