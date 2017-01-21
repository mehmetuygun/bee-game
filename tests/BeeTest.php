<?php

namespace MehmetUygun\BeeGame\Tests;

use MehmetUygun\BeeGame\Game;
use MehmetUygun\BeeGame\Model\Drone;
use MehmetUygun\BeeGame\Model\Queen;
use MehmetUygun\BeeGame\Model\Worker;

class BeeTest extends \PHPUnit_Framework_TestCase
{
	public function testDroneBee()
	{
		$game = new Game();

		$droneBee = new Drone(5, 5, 10);

		$game->addBee($droneBee);

		$this->assertEquals(5, $game->getBee('Drone')->lifeSpan);
		$this->assertEquals(5, $game->getBee('Drone')->life);
		$this->assertEquals(10, $game->getBee('Drone')->hitPoint);
	}

	public function testQueenBee()
	{
		$game = new Game();

		$queenBee = new Queen(5, 5, 10);

		$game->addBee($queenBee);

		$this->assertEquals(5, $game->getBee('Queen')->lifeSpan);
		$this->assertEquals(5, $game->getBee('Queen')->life);
		$this->assertEquals(10, $game->getBee('Queen')->hitPoint);
	}

	public function testWorkerBee()
	{
		$game = new Game();

		$workerBee = new Worker(5, 5, 10);

		$game->addBee($workerBee);

		$this->assertEquals(5, $game->getBee('Worker')->lifeSpan);
		$this->assertEquals(5, $game->getBee('Worker')->life);
		$this->assertEquals(10, $game->getBee('Worker')->hitPoint);
	}

	public function testSubHitPoint()
	{
		$game = new Game();

		$workerBee = new Worker(5, 5, 10);

		$this->assertEquals(5, $workerBee->life);

		$workerBee->subHitPoint();

		$this->assertEquals(4, $workerBee->life);
	}

}