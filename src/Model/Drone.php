<?php 
namespace MehmetUygun\Model;

use MehmetUygun\Model\Bee as Bee;

/**
* The class of drone model.
*/
class Drone extends Bee
{
	
	/**
	 * The constructor of drone model
	 * @param integer $lifeSpan 
	 * @param integer $life     
	 * @param integer $hitPoint
	 */
	function __construct($lifeSpan = 50, $life = 8, $hitPoint = 12)
	{
		$this->lifeSpan = $lifeSpan;
		$this->_lifeSpan = $lifeSpan;
		$this->life 	= $life;
		$this->_life 	= $life;
		$this->hitPoint = $hitPoint;
		$this->_hitPoint = $hitPoint;
	}
}
