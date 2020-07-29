<?php
    spl_autoload_register(function ($class_name) 
    {
        require_once $_SERVER['DOCUMENT_ROOT'].'/include/php/' . strtolower($class_name) . '.php';
    });

	header('Location: /tasks/sql/', true, 303);

	if(isset($_POST['countryName']) and isset($_POST['continentId']) and is_numeric($_POST['continentId']))
    {   
        $connect 	= new ConnectionMysql();
		$dbh 		= $connect->connectMysql();
        $stmt 		= $dbh->prepare('insert country(name, id_continent) values(?,?)');

        if ($stmt->execute(array($_POST['countryName'],$_POST['continentId']))) 
        {
            setcookie('addNewCountry', 'Добавлена новая страна.');
        }
    }  
    else 
    {
		setcookie('addNewCountry', 'Произошла ошибка при добавлении страны.');
    }
?>