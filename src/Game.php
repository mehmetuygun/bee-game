<?php 
namespace MehmetUygun\BeeGame;

use MehmetUygun\BeeGame\Model\BeeInterface;
use MehmetUygun\BeeGame\RandomGenerator;

/**
* The class of game which do game logic
*/
class Game
{
	/**
	 * @var RandomGenerator
	 */
	private $randomGenerator;

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
	 * @param RandomGenerator $randomGenerator
	 */
	public function setRandomGenerator(RandomGenerator $randomGenerator)
	{
		$this->randomGenerator = $randomGenerator;
	}

	/**
	 * Add new bee to array
	 * @param BeeInterface
	 * @return Game
	 */
	public function addBee(BeeInterface $bee)
	{
		$this->bees[] = $bee;

		return $this;
	}

	/**
	 * Get the bee information
	 * @param  string class name of bee
	 * @return object|null
	 */
	public function getBee($className)
	{
		$className = 'MehmetUygun\\BeeGame\\Model\\'.$className;
		foreach ($this->bees as $key => $value) {
			if ($value instanceof $className) {
				return $value;
			}
		}

		return null;
	}

	/**
	 * Hit the bee
	 * @param BeeInterface $selectedBee
	 * @return void
	 */
	public function hitBee(BeeInterface $bee = null)
	{
		if ($this->isOver()) {
			return;
		}

		if (null === $bee) {
			$bee = $this->randomGenerator->getRandomElement(
				$this->bees
			);
		}

		$bee->subHitPoint();

		if ($bee->isDead()) {
			$this->removeBee($bee);
		}

		$this->round += 1;
	}

	/**
	 * Check if game is over
	 * @return boolean 
	 */
	public function isOver()
	{
		return null === $this->getBee("Queen");
	}

	/**
	 * Get the current round of game
	 * @return integer
	 */
	public function getRound()
	{
		return $this->round;
	}

	/**
	 * Remove bee from the list
	 * @param  Model\Bee $selectBee	 the key of array which holds bee
	 */
	public function removeBee($selectBee)
	{
		foreach ($this->bees as $key => $bee) {
			if ($bee === $selectBee) {
				unset($this->bees[$key]);
			}
		}
	}
}
