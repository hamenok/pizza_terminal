<?php
//Получение данных с формы заказа и добавление их в базу
    if ($_POST['typeID'] == null or $_POST['typeID'] == "..." or
        $_POST['sizeID'] == null or $_POST['sizeID'] == "..." or
        $_POST['sauceID'] == null or $_POST['sauceID'] == "..."){
        echo "Данные заказа введены не корректно!";
    } else {
    
        include "db.php";
    
        $sql = "INSERT INTO orderpizza(timeOrder,typeID,sizeID,sauceID,cost) 
                VALUES(:TIMEORDER,:TYPEID,:SIZEID,:SAUCEID,:COST)"; 

        $res =$pdo->prepare($sql);
        $res->bindValue(':TIMEORDER', date("Y-m-d H:i:s"));
        $res->bindValue(':TYPEID',$_POST['typeID']);
        $res->bindValue(':SIZEID',$_POST['sizeID']);
        $res->bindValue(':SAUCEID',$_POST['sauceID']);
        $res->bindValue(':COST',$_POST['costOrder']);
        $res->execute();
    }
?>