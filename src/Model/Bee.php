<?php

	namespace Model;

	/**
	* The Bee abstract class.
	*/
  	abstract class Bee
	{	

		/**
		 * The total points of bee. When it is deducted in zero. The bee loses its life.
		 * @var integer
		 */
		public $lifeSpane;

		/**
		 * The amount of life that bee has.
		 * @var [type]
		 */
		public $life;

		/**
		 * The hit point that will deduct from bee's lifeSpan.
		 * @var [type]
		 */
		public $hitPoint

		/**
		 * The function which subtructs hit point from life span of bee
		 * @return void
		 */
		public function hit()
		{
			$this->lifeSpan -= $this->hitPoint;
		}

	}

?>