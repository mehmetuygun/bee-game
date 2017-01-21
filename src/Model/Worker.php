<?php 
namespace MehmetUygun\BeeGame\Model;

/**
* The class of worker model.
*/
class Worker extends Bee
{
	/**
	 * The constructor of worker model
	 * @param integer $lifeSpan 
	 * @param integer $life     
	 * @param integer $hitPoint
	 */
	function __construct($lifeSpan = 75, $life = 5, $hitPoint = 10)
	{
		$this->lifeSpan = $lifeSpan;
		$this->_lifeSpan = $lifeSpan;
		$this->life 	= $life;
		$this->_life 	= $life;
		$this->hitPoint = $hitPoint;
		$this->_hitPoint = $hitPoint;
	}
}
