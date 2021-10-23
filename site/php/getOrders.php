<?php
//запрос на полный вывод заказов
    include "db.php";

    $sql = "SELECT orderpizza.id as orderID,orderpizza.timeOrder as dateORDER, typepizza.name as namePIZZA,
            sizepizza.name as sizePIZZA, (sizepizza.cost + typepizza.cost) as COSTf, orderpizza.cost as fullCOST, 
            saucepizza.name as nameSAUCE,saucepizza.cost as costSAUCE
            FROM orderpizza
            JOIN sizepizza ON orderpizza.sizeID=sizepizza.id
            JOIN saucepizza ON orderpizza.sauceID=saucepizza.id
            JOIN typepizza ON orderpizza.typeID=typepizza.id
            GROUP BY orderpizza.id ASC"; 
    $res =$pdo->prepare($sql);
 
    $res->execute();
        while($row = $res->fetch())
		{
            echo "<tr>";
            echo "<th scope='row'>".$row['orderID']."</th>";
            echo "<td>".$row['namePIZZA']." ".$row['sizePIZZA']."</td>";
            echo "<td>".$row['nameSAUCE']."</td>";
            echo "<td>".$row['fullCOST']."</td>";
            echo "<td>".$row['dateORDER']."</td>";
            echo "</tr>";
		}
?>