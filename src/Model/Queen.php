<?php 
namespace MehmetUygun\BeeGame\Model;

/**
* The queen model class.
*/
class Queen extends AbstractBee
{
	const LIFE_SPAN = 100;
	const LIFE = 1;
	const HIT_POINT = 8;

	public function __construct($lifeSpan = self::LIFE_SPAN, $life = self::LIFE, $hitPoint = self::HIT_POINT)
	{
		parent::__construct($lifeSpan, $life, $hitPoint);
	}
}
