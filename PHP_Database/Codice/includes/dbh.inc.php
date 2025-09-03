<?php
//Stabilisco nome database, host, username e password
$dbServername = "mysql:host=localhost;dbname=Calendario";
$dbUsername = "root";
$dbPassword = "";


try{
    //Creazione connessione al database
    $pdo = new PDO($dbServername, $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection Failed: ".$e->getMessage();
}


