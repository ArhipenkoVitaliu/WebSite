<?php
/**
* Text
* 
* Class for preparing text and output in the browser.
* 
* @author Архипенко Виталий Олегович <arhipenko.vitaliu@gmail.com>
* @version 1.0
*/
class Text{
	/**
	* Create linked text
	* 
	* @param string $text Text
	* @param string $link Link
	* @param int $length Length
	* @return string
	*/
	static public function createLinkedText($text, $link, $length = 180)
	{
		$result = Text::trimText($text, $length);

		if($result !== null) 
		{
			$result = Text::insertLink($result, $link);
		} 
		else 
		{
			$result = Text::insertLink($text, $link);
		}
		return $result;
	}
	
	/**
	* Trim text
	*
	* If the text length is greater than the passed parameter, 
	* then it truncates the line and adds an three dots to the end.
	* 
	* @param string $text Text
	* @param int $length Length
	* @return string
	*/
	static public function trimText($text, $length = 180) 
	{
		if(mb_strlen($text) <= $length)
		{
			return null;
		} 
		else 
		{
			return trim(mb_substr($text,0,$length)).'...';
		}
	}

	/**
	* Insert link
	*
	* Makes the last two words a reference. If there are no two words 
	* in the text, returns the unchanged text.
	* 
	* @param string $text Text
	* @param string $link Link
	* @return string
	*/
	static public function insertLink($text, $link) 
	{
		$countSpace = 0;
		$indexLastSpace =-1;

		for($i = mb_strlen($text); $i > 0; $i-=1)
		{
			if(mb_substr($text, $i, 1, "UTF-8")==' ') 
			{
				$countSpace +=1;
			} 
			if ($countSpace == 2) 
			{
				$indexLastSpace = $i+1;
				break;
			}
		}

		if ($indexLastSpace==-1)
		{
			return $text;
		} 

		$result = mb_substr($text, 0, $indexLastSpace, 'UTF-8') . '<a href="'.$link.'">';
		$result .= mb_substr($text, $indexLastSpace) . '</a>';

		return $result;
	}
}

?>