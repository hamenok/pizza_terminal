<?php
//Настройка подключения к БД
    $host = 'localhost';
    $db   = 'pizza';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';
    $connectData = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($connectData, $user, $pass, $opt);
    return $pdo;
?>