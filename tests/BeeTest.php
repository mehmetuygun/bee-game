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
		$droneBee = new Drone(5, 5, 10);

		$this->assertEquals(5, $droneBee->getLifeSpan());
		$this->assertEquals(5, $droneBee->getLife());
		$this->assertEquals(10, $droneBee->getHitPoint());
	}

	public function testQueenBee()
	{
		$queenBee = new Queen(5, 5, 10);

		$this->assertEquals(5, $queenBee->getLifeSpan());
		$this->assertEquals(5, $queenBee->getLife());
		$this->assertEquals(10, $queenBee->getHitPoint());
	}

	public function testWorkerBee()
	{
		$workerBee = new Worker(5, 5, 10);

		$this->assertEquals(5, $workerBee->getLifeSpan());
		$this->assertEquals(5, $workerBee->getLife());
		$this->assertEquals(10, $workerBee->getHitPoint());
	}

	public function testSubHitPoint()
	{
		$workerBee = new Worker(5, 5, 10);

		$this->assertEquals(5, $workerBee->getLife());

		$workerBee->subHitPoint();

		$this->assertEquals(4, $workerBee->getLife());
	}
}