<?php 
	spl_autoload_register(function ($class_name) 
	{
	    require_once $_SERVER['DOCUMENT_ROOT'].'/include/php/' . strtolower($class_name) . '.php';
	});

	require_once $_SERVER['DOCUMENT_ROOT'].'/include/template/header.html';
?>

<h4>Проблемы в этой задаче:</h4>
<p>
	В переменной $a лежит текст новости. В переменной $link лежит ссылка на страницу с полным текстом этой новости.<br>
	Нужно в переменную $b записать сокращенный текст новости по правилам:<br>
	 - обрезать до 180 символов<br>
	 - приписать многоточие<br>
	 - последние 2 слова и многоточие сделать ссылкой на полный текст новости.<br>
	 Какие проблемы вы видите в решении этой задачи? Что может пойти не так?<br>
</p>
<p>Надо учитывать кодировку текста. Для работы с многобайтными строками нужно использовать функции mb_.</p>
<p>Проблемы с входными данными: текст меньше 180 символов или его отсутствие; в тексте нет пробелов и нельзя найти последнии два слова.</p>
<p>В тексте может быть HTML, JS код.</p>

<h4>Список статей</h4>
<table class="table table-bordered">
	<tr><th>Автор</th><th>Текст</th></tr>
	<?php
		$connect 	= new ConnectionMysql();
		$dbh 		= $connect->connectMysql();
		$stmt 		= $dbh->prepare("SELECT * FROM articles");

		if ($stmt->execute())
		{
		    while ($row = $stmt->fetch())
		    {
		        echo '<tr>';
		        echo '<td>'.htmlspecialchars($row['author']).'</td>';

	    		$a 		= htmlspecialchars($row['text']);
	    		$link 	= '/tasks/linked-text/article.php?id=';
	    		$b 		= Text::createLinkedText($a, $link . $row[0], 180);

	    		echo '<td>'. $b .'</td>';
		        echo '</tr>';
		    }
		}
	?>
</table>

<?php	
	require_once $_SERVER['DOCUMENT_ROOT'].'/include/template/footer.html';
?>