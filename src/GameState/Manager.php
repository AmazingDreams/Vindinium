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
		$this->updateStats($content->game);

		$heroes = $this->_board->getHeroes();
	}

    public function updateStats($game)
    {
        $this->_id = $game->id;
        $this->_currentTurn = $game->turn;
        $this->_maxTurns = $game->maxTurns;
        $this->_gameHasFinished = $game->finished;

		$this->_heroes = $this->_board->getHeroes();

		foreach($this->_heroes as $hero)
		{
			foreach($game->heroes as $gameHero)
				if($gameHero->id == $hero->id)
					break;

			foreach($gameHero as $key => $value)
				$hero->$key = $value;
		}
    }

    public function getBoard()
    {
        return $this->_board;
    }

}
