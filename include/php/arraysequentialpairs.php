<?php
/**
* Array sequential pairs
* 
* Class for finding the amount of consecutive pairs of identical elements.
* 
* @author Архипенко Виталий Олегович <arhipenko.vitaliu@gmail.com>
* @version 1.0
*/
class ArraySequentialPairs
{
	private $array;

	/**
    * Create new array
    * 
    * @param int $count Amount of numbers in the array
    * @param int $minValue Minimum number
    * @param int $maxValue Maximum number
    * @return array
    */
	public function createArray($count = 100, $minValue = 0, $maxValue = 10)
	{
		for($i = 0; $i < $count; $i++)
		{
			$this->array[$i] = rand($minValue, $maxValue);
		}
		return $this->array;
	}

	/**
    * Get array
    * 
    * @return array
    */
	public function getArray()
	{
		return $this->array;
	}

	/**
    * Set new array
    * 
    * @param array $newArray New array
    */
	public function setArray($newArray)
	{
		if(is_array($newArray))
		{
			$this->array = $newArray;
		}
	}

	/**
    * Find the amount of consecutive pairs of identical elements.
    *
    * The method returns a two-dimensional array, where Key is the beginning of the sequence 
    * and Value is an array, in which the first element is a number and the second is the amount.
    * 
    * @return array
    */
	public function findSequentialPairs()
	{
		$result = array();
		$isSequential = false;
		$startIndex;

		for($i = 0; $i < count($this->array) - 1; $i++)
		{
			if($this->array[$i] == $this->array[$i+1])
			{
				if($isSequential and $this->array[$i] == $this->array[$startIndex])
				{
					$result[$startIndex][1]++;
				} 
				else 
				{
					$startIndex = $i;
					$result[$startIndex][0] = $this->array[$i];
					$result[$startIndex][1] = 1;
				}
				$i++;
				$isSequential = true;
			}
			else 
			{
				$isSequential = false;
			}
		}
		return $result;
	}
}
?>