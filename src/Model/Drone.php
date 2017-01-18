<?php namespace App\Model;

	use App\Model\Bee;

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
			$this->life 	= $life;
			$this->hitPoint = $hitPoint;
		}
	}
?>