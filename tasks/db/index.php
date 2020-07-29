<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/include/template/header.html';
?>

<h4>Базы данных</h4>
<p>
	Чем отличаются эти запросы:<br>
	SELECT * FROM a, b WHERE a.id=b.a_id;<br>
	SELECT * FROM a JOIN b ON a.id=b.a_id;<br><br>

	Первый вариант использовался до принятия стандарта SQL-92.<br>
	Во втором варианте условия соединения таблиц выненсены в отдельный блок ON, благодаря этому упрощается понимание запроса.<br>
	В первом варианте синтаксис запроса немного отличается в зависимости от сервера БД, в отличии от запроса с JOIN.<br>
</p>

<?php   
    require_once $_SERVER['DOCUMENT_ROOT'].'/include/template/footer.html';
?>