<?php 
	spl_autoload_register(function ($class_name) 
	{
	    require_once $_SERVER['DOCUMENT_ROOT'].'/include/php/' . strtolower($class_name) . '.php';
	});
	
	header('Content-Type: image/png');

	$image = new Image($_SERVER['DOCUMENT_ROOT'].'/images/mega_image.png');
	$image->scaleImage(200,100);
	$image->printImage();

?>