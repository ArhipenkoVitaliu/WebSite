<?php 
	spl_autoload_register(function ($class_name) 
	{
	    require_once $_SERVER['DOCUMENT_ROOT'].'/include/php/' . strtolower($class_name) . '.php';
	});

	require_once $_SERVER['DOCUMENT_ROOT'].'/include/template/header.html';
?>


<h4>Массивы</h4>
<p>Дан массив из 100 элементов. Требуется вывести количество последовательных пар одинаковых элементов.</p>
<p>
	<?php
		$arraySequentialPairs = new ArraySequentialPairs();
		$arraySequentialPairs->createArray(100,0,5);

		$result = $arraySequentialPairs->findSequentialPairs();
		$array 	= $arraySequentialPairs->getArray();
		
		foreach ($result as $key => $value) 
		{
			$array[$key] = '<font color="red">' . $array[$key];
			$indexLastSeuential = $key + $value[1] * 2 - 1;
			$array[$indexLastSeuential] = $array[$indexLastSeuential] . '</font>';
		}

		echo '<h5>Массив</h5>';
		for($i = 0; $i < count($array); $i++)
		{
			echo $array[$i] . ' ';
			if($i % 10 == 9) echo '<br>';
		}
	?>
</p>

<h5>Результат работы алгоритма</h5>
<div class="scroll" >
	<table class="table" >
        <tr><th>Начало последовательности</th><th>Число</th><th>Кол-во пар</th></tr>
		<?php
			foreach ($result as $key => $value) 
			{
				echo "<tr><th>$key</th><th>$value[0]</th><th>$value[1]</th></tr>";
			}
		?>
	</table>
</div>


<?php	
	require_once $_SERVER['DOCUMENT_ROOT'].'/include/template/footer.html';
?>