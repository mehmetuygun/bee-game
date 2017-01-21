<?php 
namespace MehmetUygun\BeeGame\Model;

/**
* The queen model class.
*/
class Queen extends Bee
{
	
	/**
	 * The constructor of queen model
	 * @param integer $lifeSpan 
	 * @param integer $life     
	 * @param integer $hitPoint
	 */
	function __construct($lifeSpan = 100, $life = 1, $hitPoint = 8)
	{
		$this->lifeSpan = $lifeSpan;
		$this->_lifeSpan = $lifeSpan;
		$this->life 	= $life;
		$this->_life 	= $life;
		$this->hitPoint = $hitPoint;
		$this->_hitPoint = $hitPoint;
	}
}
?>