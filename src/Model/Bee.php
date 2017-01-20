<?php 
namespace MehmetUygun\Model;

/**
* The Bee abstract class.
*/
abstract class Bee
{	
	/**
	 * The total points of bee. When it is deducted in zero. The bee loses its life.
	 * @var integer
	 */
	public $lifeSpan;

	/**
	 * The amount of life that bee has.
	 * @var [type]
	 */
	public $life;

	/**
	 * The hit point that will deduct from bee's lifeSpan.
	 * @var [type]
	 */
	public $hitPoint;

	/**
	 * The function which subtructs hit point from life span of bee
	 * @return void
	 */
	
	protected $_lifeSpan, $_life, $_hitPoint;

	public function hit()
	{
		$this->lifeSpan -= $this->hitPoint;
	}

	/**
	 * The function which check if bee is dead
	 * @return boolean
	 */
	public function isDead()
	{
		if ($this->life < 1) {
			return true; 
		} elseif ($this->lifeSpan < 1) {
			$this->subLife();
			$this->resetLifeSpan();
		}

		return false;
	}

	/**
	 * Subtruct hit point from lifespan of bee
	 * @return void
	 */
	public function subHitPoint()
	{
		$this->lifeSpan -= $this->hitPoint;

		if ($this->lifeSpan < 1)
			$this->subLife();
	}

	private function subLife($life = 1)
	{
		$this->life -= $life;
	}

	private function resetLifeSpan()
	{
		$this->lifeSpan = $this->_lifeSpan;
	}

}

?>