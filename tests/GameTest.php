<?php

namespace App\Tests

class GameTest extends \PHPUnit_Framework_Test_Case
{
	public function testAddsBee()
	{
		$game = new Game();

		$bee = new Drone(3, 5, 6);

		$game->addBee($bee);

		$this->assertContains($bee, $game->bees);
		$this->assertCount(1, $game->bees);
	}
}

class BeeTest extends \PHPUnit_Framework_Test_Case
{
	public function testHit()
	{
		$bee = new Drone(5, 3, 2);
		$bee->hit();

		$this->assertEquals(3, $bee->lifeSpan);
	}
}
