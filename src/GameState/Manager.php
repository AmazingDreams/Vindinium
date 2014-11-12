<?php

namespace AD9001\GameState;

use \AD9001\Game\Board;
use \AD9001\Game\Game;
use \AD9001\Netcode\Api as API;

class Manager {

	private $_api;

    private $_id;

    private $_currentTurn;

    private $_maxTurns;

    private $_heroes;

    private $_gameHasFinished;

    private $_board;

	public function __construct(API $api)
	{
		$this->_api = $api;
	}

	public function go($gameType)
	{
		$response = $this->_api->start($gameType);
		$content  = $response->getContent();

		$this->_board = new Board($content->game->board);

	}

    public function updateStats($game)
    {

        $this->_id = $game->id;
        $this->_currentTurn = $game->turn;
        $this->_maxTurns = $game->maxTurns;
        $this->_heroes = $game->heroes;
        $this->_board = $game->board;
        $this->_gameHasFinished = $game->finished;
    }

    public function getBoard()
    {
        return $this->_board;
    }

}
