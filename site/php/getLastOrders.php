<?php
//запрос на последний заказ и его вывод в чек
    include "db.php";

    $sql = "SELECT orderpizza.id as orderID,orderpizza.timeOrder as dateORDER, typepizza.name as namePIZZA,
            sizepizza.name as sizePIZZA, (sizepizza.cost + typepizza.cost) as COSTf, orderpizza.cost as fullCOST, 
            saucepizza.name as nameSAUCE,saucepizza.cost as costSAUCE
            FROM orderpizza
            JOIN sizepizza ON orderpizza.sizeID=sizepizza.id
            JOIN saucepizza ON orderpizza.sauceID=saucepizza.id
            JOIN typepizza ON orderpizza.typeID=typepizza.id
            WHERE orderpizza.id=(SELECT max(orderpizza.id) FROM orderpizza)"; 
    $res =$pdo->prepare($sql);
 
    $res->execute();
        while($row = $res->fetch())
		{
            echo "<blockquote class='blockquote'>";
            echo "<p>ЗАКАЗ</p>";
            echo "</blockquote>";
            echo "<figcaption class='blockquote-footer'>";
            echo "Пицца: ".$row['namePIZZA']." ".$row['sizePIZZA']." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$row['COSTf']." руб.";
            echo "</figcaption>";
            echo "<figcaption class='blockquote-footer'>";
            echo "Соус:&nbsp;&nbsp;&nbsp; ".$row['nameSAUCE']." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$row['costSAUCE']." руб.";
            echo "</figcaption>";
            echo "</figure>";
            echo "<p>#--------------------------------</p>";
            echo "<p>ИТОГ &nbsp;&nbsp;&nbsp;&nbsp;<strong>".$row['fullCOST']." руб.</strong></p>";
            echo "<br>";
            echo "<p class='alignCenter'>".$row['dateORDER']." <strong> &nbsp;&nbsp;№".$row['orderID']."</strong></p>";            
		}
?>