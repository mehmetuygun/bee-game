<?php 
namespace MehmetUygun\BeeGame\Model;

/**
* The class of drone model.
*/
class Drone extends AbstractBee
{
	const LIFE_SPAN = 50;
	const LIFE = 8;
	const HIT_POINT = 12;

	public function __construct($lifeSpan = self::LIFE_SPAN, $life = self::LIFE, $hitPoint = self::HIT_POINT)
	{
		parent::__construct($lifeSpan, $life, $hitPoint);
	}
}
