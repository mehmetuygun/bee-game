<?php

namespace MehmetUygun\BeeGame\Tests;

use MehmetUygun\BeeGame\Game;
use MehmetUygun\BeeGame\Model\Drone;
use MehmetUygun\BeeGame\Model\Queen;
use MehmetUygun\BeeGame\Model\Worker;

class GameTest extends \PHPUnit_Framework_TestCase
{
	public function testAddsAndGetsBee()
	{
		$game = new Game();

		$bee = new Drone(3, 5, 6);

		$game->addBee($bee);

		$this->assertInstanceOf(Drone::class, $game->getBee('Drone'));

		$game->removeBee($bee);

		$this->assertNotInstanceOf(Drone::class, $game->getBee('Drone'));

	}

	public function testIsOver()
	{
		$game = new Game();

		$this->assertTrue($game->isOver());

		$Queen = new Queen();
		$game->addBee($Queen);

		$this->assertFalse($game->isOver());
	}

	public function testRemoveBee()
	{
		$game = new Game();

		$bee = new Drone();

		$game->addBee($bee);

		$this->assertInstanceOf(Drone::class, $game->getBee("Drone"));


		$game->removeBee($bee);

		$this->assertNull($game->getBee("Drone"));
	}

	public function testHitBeeAndSelectBee()
	{
		$game = new Game();

		$queenBee = new Queen(100, 5, 5);
		$bee = new Drone(10, 5, 5);
		$workerBee = new Worker(1, 5, 5);
		
		$game->addBee($workerBee);
		$game->addBee($bee);
		$game->addBee($queenBee);

		$game->hitBee($bee);
		$game->hitBee($workerBee);

		$this->assertEquals(5, $game->getBee("Drone")->lifeSpan);

		$this->assertEquals(4, $game->getBee('Worker')->life);

	}

	public function testGetRound()
	{
		$game = new Game();

		$queenBee = new Queen(10, 5, 5);

		$game->addBee($queenBee);

		$this->assertEquals(0, $game->getRound());

		$game->hitBee($queenBee);

		$this->assertEquals(1, $game->getRound());
	}
}

