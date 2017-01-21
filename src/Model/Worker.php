<?php 
namespace MehmetUygun\BeeGame\Model;

/**
* The class of worker model.
*/
class Worker extends AbstractBee
{
	const LIFE_SPAN = 75;
	const LIFE = 5;
	const HIT_POINT = 10;

	public function __construct($lifeSpan = self::LIFE_SPAN, $life = self::LIFE, $hitPoint = self::HIT_POINT)
	{
		parent::__construct($lifeSpan, $life, $hitPoint);
	}
}
