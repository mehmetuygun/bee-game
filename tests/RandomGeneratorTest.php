<?php

namespace MehmetUygun\BeeGame\Tests;

use MehmetUygun\BeeGame\RandomGenerator;

class RandomGeneratorTest extends \PHPUnit_Framework_TestCase
{
	public function testGetRandomElement()
	{
		$RandomGenerator = new RandomGenerator();
		
		$array = [1, 2];

		$this->assertContains($RandomGenerator->getRandomElement($array), $array);

 	}

 	public function testGetRandomElementReturnNull()
 	{
		$RandomGenerator = new RandomGenerator();
		
		$array = [];

		$this->assertNull($RandomGenerator->getRandomElement($array));
 	}
}