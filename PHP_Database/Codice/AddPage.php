<!DOCTYPE html>
<html>

<head>
    <title>Registra</title>
    <link rel="stylesheet" href="css/main.css">

    <?php
    //Controlla se la pagina e' stata accessa tramite metodo POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {   
        $creatore = $_POST['creatore'];
        $password = $_POST['password'];
    }else{
        header("Location:LoginPage.php");
    }
    ?>


</head>

    
<body>

    <style>
        button.back{
            display: flex;
            align-self: start;
        }
    </style>

    <!--Pulsante indietro-->
    <form action="CheckPage.php" method="post">
        <!--Informazioni nascoste, necessarie per poter tornare indietro-->
        <input type="hidden" name="password" value='<?php echo "$password" ?>'>
        <button type="submit" name="creatore" class="button-19 back" value='<?php echo "$creatore" ?>'><==</button>
    </form>

    <h3>Aggiungi Evento</h3>
    <!--Form inserimento dati per un nuovo evento-->
    <form action="includes/formhandler.inc.php" method="post">
        <input type="text" name="titolo" placeholder="Titolo" class="input"><br/>
        <input type="text" name="descrizione" placeholder="Descrizione" class="input"><br/>
        <input type="text" name="data" placeholder="Data AAAA-MM-GG" class="input"><br/>

        <!--Creatore e' necessario per completare automaticamentr il campo ID del creatore, questo e' salvato da quando e' stato fatto il login-->
        <input type="hidden" name="creatore" value='<?php echo "$creatore" ?>'>
        <!--Informazione necessaria per poter ritornare alla pagina CheckPage.php dopo l'aggiunta di un nuovo evento-->
        <input type="hidden" name="password" value='<?php echo "$password" ?>'>

        <input type="submit" value="Aggiungi" class="button-19 animateOpacity"/> 
    </form>
</body>
</html>