<?php

	namespace Model;

	use Bee;

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
		function __construct($lifeSpan = 100, $life = 1, $hitPoint = 10)
		{
			$this->lifeSpan = $lifeSpan;
			$this->life 	= $life;
			$this->hitPoint = $hitPoint;
		}
	}
?>