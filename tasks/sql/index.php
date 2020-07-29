<?php 
	spl_autoload_register(function ($class_name) 
	{
	    require_once $_SERVER['DOCUMENT_ROOT'].'/include/php/' . strtolower($class_name) . '.php';
	});

	require_once $_SERVER['DOCUMENT_ROOT'].'/include/template/header.html';
?>


<h4>Страны</h4>
<div class="scroll">
	<table class="table table-bordered table-striped">
		<tr><th>Страна</th><th>Континент</th></tr>
		<?php
			$connect 	= new ConnectionMysql();
			$dbh 		= $connect->connectMysql();
			$stmt 		= $dbh->prepare("	SELECT country.name , continents.name 
											FROM country INNER JOIN continents 
											ON country.id_continent = continents.id 
											ORDER BY country.name; ");

			if ($stmt->execute())
			{
			    while ($row = $stmt->fetch())
			    {
			        echo '<tr><td>'.htmlspecialchars($row[0]).'</td>';
		    		echo '<td>'.htmlspecialchars($row[1]).'</td></tr>';
			    }
			}
		?>
	</table>
</div>
<br>

<h4>Добавление страны</h4>
<form method="post" action="/tasks/sql/new-country.php" enctype='multipart/form-data'>
    <p>	
    	<input class="form-control width-medium" type='text' name='countryName' placeholder="Название страны"/>
    </p>
	<p>
    	<select class="form-control width-medium" name="continentId">
    		<?php
    			$stmt = $dbh->prepare("SELECT id, name FROM continents ORDER BY name;");

				if ($stmt->execute())
				{
				    while ($row = $stmt->fetch())
				    {
				        echo '<option value='. htmlspecialchars($row[0]) .'>' . htmlspecialchars($row[1]) . '</option>';
				    }
				}
    		?>
		</select>
	</p>
	<p>
    	<input class="btn btn-primary" type='submit' value='Send' />
	</p>
</form>

<?php
    if(isset($_COOKIE['addNewCountry']))
    {
    	echo '<p>'.htmlspecialchars($_COOKIE['addNewCountry']).'</p>';
    	setcookie("addNewCountry", null, time()-1);
    }
?>

<?php	
	require_once $_SERVER['DOCUMENT_ROOT'].'/include/template/footer.html';
?>