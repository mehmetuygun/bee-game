<?php namespace App;

	/**
	* The class of game which do game logic
	*/
	class Game
	{
		public $queen;
		public $worker;
		public $drone;

		public $round = 0;

		function __construct()
		{
			$this->queen = new Model\Queen;
			$this->worker = new Model\Worker;
			$this->drone = new Model\Drone;
		}

		/**
		 * The function does select bee randomly
		 * @return int
		 */
		public function selectBee()
		{
			return rand(1,3);
		}

		/**
		 * Hit the bee
		 * @return void
		 */
		public function hit()
		{
			if (!$this->isOver()) {
				switch ($this->selectBee()) {
					case 1:
						$this->queen->hit();
						if ($this->queen->lifeSpan < 1)
						{
							$this->queen->life -= 1;
							$this->queen->lifeSpan = 100; 
						}
						break;
					case 2:
						$this->worker->hit();
						if ($this->worker->lifeSpan < 1)
						{
							$this->worker->life -= 1;
							$this->worker->lifeSpan = 75; 
						}
						break;
					case 3:
						$this->drone->hit();
						if ($this->drone->lifeSpan < 1)
						{
							$this->drone->life -= 1;
							$this->drone->lifeSpan = 50; 
						}
						break;
					
					default:
						# code...
						break;
				}

				$this->round += 1;
			}
		}

		/**
		 * Check if game is over
		 * @return boolean 
		 */
		public function isOver()
		{
			return $this->queen->isDead();
		}
	}
 	
?>