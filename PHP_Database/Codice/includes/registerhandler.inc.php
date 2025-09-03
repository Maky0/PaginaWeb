<?php
//Controllo se la pagina e' stata avviata con metodo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Assegnazione variabili dal post
    $nome = array_key_exists('nome', $_POST) ? $_POST['nome'] : '';
    $password = array_key_exists('password', $_POST) ? $_POST['password'] : '';

    try {
        require_once "dbh.inc.php";

        //Creazione query
        $query = "INSERT INTO utente (nome, password) VALUES (:nome,:password);"; 

        $stmt = $pdo->prepare($query);

        //Uso delle variabili all'interno della query
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":password", $password);

        $stmt->execute();

        //Svuoto pdo e smtm
        $pdo = null;
        $stmt = null;
        //Dopo la registrazione ritorna alla pagina di login
        die(header("Location:../LoginPage.php"));
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    //In caso la richiesta non fosse POST, ritorna al login
    header("Location:../LoginPage.php");
}