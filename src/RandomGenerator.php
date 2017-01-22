<?php 
namespace MehmetUygun\BeeGame;

/**
* The random generator class
*/
class RandomGenerator
{
	/**
	 * The function selects a random element from the given array
	 *
	 * @param array $array
	 * @return mixed|null
	 */
	public function getRandomElement($array)
	{	
		if (!$array) {
			return null;
		}

		$key = array_rand($array);

		return $array[$key];
	}
}