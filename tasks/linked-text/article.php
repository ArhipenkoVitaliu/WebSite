<?php 
    spl_autoload_register(function ($class_name) 
    {
        require_once $_SERVER['DOCUMENT_ROOT'].'/include/php/' . strtolower($class_name) . '.php';
    });

    require_once $_SERVER['DOCUMENT_ROOT'].'/include/template/header.html';
?>

<table class="table">
    <tr><th>Автор</th><th>Текст</th></tr>
    <?php
        $connect    = new ConnectionMysql();
        $dbh        = $connect->connectMysql();
        $stmt       = $dbh->prepare('SELECT author, text FROM articles WHERE id=?');

        if ($stmt->execute(array($_GET["id"])))
        {            
            if($row = $stmt->fetch())
            {
                echo '<tr>';
                for ($j = 0 ; $j < 2 ; ++$j) 
                {
                   echo '<td>'.htmlspecialchars($row[$j]).'</td>';
                }
                echo '</tr>';
            }
        }
    ?>
</table>

<?php   
    require_once $_SERVER['DOCUMENT_ROOT'].'/include/template/footer.html';
?>