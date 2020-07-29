<?php
/**
* Image
* 
* Class for preparing images, that are displayed in the browser.
* 
* @author Архипенко Виталий Олегович <arhipenko.vitaliu@gmail.com>
* @version 1.0
*/
class Image
{
	private $image;
	private	$imageType;

	/**
	* Construct
	* 
	* @param string $fileName File name
	*/
	function __construct($fileName)
	{
		$this->loadImage($fileName);
	}

	function __destruct()
	{
		imagedestroy($this->image);
	}

	/**
	* Load image
	* 
	* @param string $fileName File name
	*/
	function loadImage($fileName) 
	{
		$imageInfo = getimagesize($fileName);
		$this->imageType = $imageInfo[2];
		ini_set('memory_limit', '-1');

		if( $this->imageType == IMAGETYPE_JPEG ) 
		{
			$this->image = imagecreatefromjpeg($fileName);
		} 
		elseif( $this->imageType == IMAGETYPE_PNG ) 
		{
			$this->image = imagecreatefrompng($fileName);
		}
	}

	/**
	* Print image
	*
	* Outputs the image to the browser.
	* 
	*/
	function printImage() 
	{
		if(isset($this->image))
		{
			if( $this->imageType == IMAGETYPE_JPEG ) 
			{
				imagejpeg($this->image);
			} 
			elseif( $this->imageType == IMAGETYPE_PNG ) 
			{
				imagepng($this->image);
			}
		}
	}	
	
	/**
	* Scale image
	* 
	* @param int $width Width
	* @param int $height Height
	*/
	function scaleImage($width, $height)
	{
		$this->image = imagescale($this->image, $width, $height, IMG_BILINEAR_FIXED);
	}
}
?>
