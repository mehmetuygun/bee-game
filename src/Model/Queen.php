<?php namespace App\Model;

	use App\Model\Bee;

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
			$this->life 	= $life;
			$this->hitPoint = $hitPoint;
		}
	}

?>