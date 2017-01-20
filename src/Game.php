<?php 
namespace MehmetUygun;

/**
* The class of game which do game logic
*/
class Game
{
	/**
	 * hold bees in a array
	 * @var array
	 */
	private $bees = [];

	/**
	 * hold counted round
	 * @var integer
	 */
	private $round = 0;

	/**
	 * The function does select bee randomly
	 * @return int
	 */
	public function selectBee()
	{
		return array_rand($this->bees);
	}

	/**
	 * Add new bee to array
	 * @param object
	 */
	public function addBee($bee)
	{
		$this->bees[] = $bee;
	}

	/**
	 * Get the bee information
	 * @param  string class name of bee
	 * @return object
	 */
	public function getBee($className)
	{
		$className = 'MehmetUygun\\Model\\'.$className;
		foreach ($this->bees as $key => $value) {
			if ($value instanceof $className)
				return $value;
		}
	}

	/**
	 * Hit the bee
	 * @return void
	 */
	public function hitBee($selectBee = null)
	{
		if ($this->isOver()) {
			return;
		}

		if ($selectBee) {
			$selectedBee = $selectBee;
			$bee = $this->bees[$selectedBee];
		} else {
			$selectedBee = $this->selectBee();
			$bee = $this->bees[$selectedBee];
		}

		$bee->subHitPoint();

		if ($bee->isDead()) {
			$this->removeBee($selectedBee);
		}

		$this->round += 1;
	}

	/**
	 * Check if game is over
	 * @return boolean 
	 */
	public function isOver($bee = "Queen" )
	{
		if (!in_array($this->getBee("Queen"), $this->bees))
			return true;
		return $this->getBee("Queen")->isDead();
	}

	/**
	 * Remove bee from the list
	 * @param  integer 			 the key of array which holds bee
	 * @return void
	 */
	private function removeBee($selectBee)
	{
		unset($this->bees[$selectBee]);
	}

	/**
	 * Get the current round of game
	 * @return integer
	 */
	public function getRound()
	{
		return $this->round;
	}
}
