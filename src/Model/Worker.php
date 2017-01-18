<?php namespace App\Model;

	use App\Model\Bee as Bee;

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
			$this->life 	= $life;
			$this->hitPoint = $hitPoint;
		}
	}
?>