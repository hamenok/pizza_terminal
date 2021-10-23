<?php
    function getData($a, $item)
    {
        //Получаем все данные из переданной таблицы
        $items = $a->query("SELECT * FROM $item");
        while ($row = $items->fetch())
        {
            echo "<option value=".$row['id']." data-cost=".$row['cost'].">".$row['name']."</option>";
        }
    }
?>
