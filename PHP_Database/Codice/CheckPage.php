<!DOCTYPE html>
<html lang="en">

<head>
    <title>Calendario</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scalw=1.0">
    <link rel="stylesheet" href="css/main.css">
</head> 


    <body>
        
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $creatore = array_key_exists('creatore', $_POST) ? $_POST['creatore'] : '';
            $password = array_key_exists('password', $_POST) ? $_POST['password'] : '';


            try{

                require_once "includes/dbh.inc.php";

                //Query per ottenere dal nome utente -> l'ID
                $query = "SELECT ID FROM utente where nome = '$creatore';";

                $stmt = $pdo->prepare($query);

                $stmt->execute();

                $idCreatore = $stmt->fetch(PDO::FETCH_COLUMN);

                //Controllo se esiste il nome utente
                if (empty($idCreatore)) {

                    die(header("Location:LoginPage.php"));

                }else{//Se esiste il nome, controlla se la password e' giusta

                    $query = "SELECT password FROM utente where ID = '$idCreatore';";

                    $stmt = $pdo->prepare($query);

                    $stmt->execute();

                    $results1 = $stmt->fetch(PDO::FETCH_COLUMN);;

                    if ($password != $results1){

                        die(header("Location:LoginPage.php"));
                        //die(printf($results1)); //Scambiare con la riga sopra per sapere la password in caso sia errata
                        
                    }
                }


            }catch(PDOException $e){
                die("Query Failed: " . $e->getMessage());
            }

            try {
                //Prendiamo ogni evento creato dall'utente con ID uguale all'utente che ha fatto il login
                $query = "SELECT * FROM evento where creatore = '$idCreatore';" ;

                $stmt = $pdo->prepare($query);

                $stmt->execute();

                //Prendiamo tutti i risultati dela query
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $pdo = null;
                $stmt = null;

            } catch (PDOException $e) {

                die("Query Failed: " . $e->getMessage());

            }
        } else {
            header("Location:LoginPage.php");
        }
        ?>
        
        <style>
            button.back{
                display: flex;
                align-self: start;
            }
        </style>

        <!--Bottone indietro-->
        <form action="LoginPage.php">
            <button type="submit" name="Register" class="button-19 back"><==</button>
        </form>

        <h3 class="Lista Eventi"> Lista Eventi</h3>
        <!--Pulsante aggiungi evento-->
        <form action="AddPage.php" method="post">
            <!--Form per il bottone. Aggiunto un passW post per poter tornare indietro, sapevo che avrei dovuto usare una sessione :-( -->
            <button type="submit" class="animationRightLeft button-19" value='<?php echo "$creatore";?>' name="creatore">Nuovo Evento</button>
            <input type="hidden" name="password" value='<?php echo "$password"; ?>'>

        </form><br> 

        <?php
        //Se non ci sono eventi
        if (empty($results)) {
            echo "<div class='pazienti'>";
            echo "<p>Nessun Evento</p>";
            echo "</div>";
        } else { //Stampa ogni evento in un div separato
            foreach ($results as $row) {
                echo "<div class='divAnim'>"; 
                ?> <style>
                        .divAnim{animation-delay: +100ms;}
                    </style> <?php
                echo "<h4>" /*. "Titolo: "*/ . htmlspecialchars($row["titolo"]) . "</h4>";
                echo "<p class='descrizioneEvento'>" /*. "Descrizione: "*/ . htmlspecialchars($row["descrizione"]) . "</p>";
                echo "<p class='data'>" . "Data: " . htmlspecialchars($row["data"]) . "</p>";
                //echo "<p class='testoPazienti'>" . "Creatore " . htmlspecialchars($row["creatore"]) . "</p>"; //Restituisce l'ID
                echo "</div>";
                echo "<br/>";
            }
        }
        ?>

    </body>
</html>