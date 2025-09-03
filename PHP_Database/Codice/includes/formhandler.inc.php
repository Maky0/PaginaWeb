<!DOCTYPE html>
<html>

<head>
    <title>Aggiunto</title>
</head>

<!--Chiama la funzione javascript per fare sumbit non appena carica la pagina-->
<body onload="InstantSubmit();">

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titolo = $_POST['titolo'];
    $descrizione = $_POST['descrizione'];
    $data = $_POST['data'];
    $creatore = $_POST['creatore']; //Get in string, transform to ID and make query 
    $password = array_key_exists('password', $_POST) ? $_POST['password'] : '';

    try{
        require_once "dbh.inc.php";

        $name_to_id_query = "SELECT ID FROM utente WHERE nome = '$creatore';";
        $stmt2 = $pdo->prepare($name_to_id_query);
        $stmt2->execute();
        $trans_id = $stmt2->fetchColumn();  

        $query = "INSERT INTO evento (titolo, descrizione, data, creatore) VALUES (:titolo,:descrizione,:data,:creatore);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":titolo", $titolo);
        $stmt->bindParam(":descrizione", $descrizione);
        $stmt->bindParam(":data", $data);
        $stmt->bindParam(":creatore", $trans_id);

        $stmt->execute();

        $pdo = null;
        $stmt = null;



    }catch(PDOException $e){
        die("Query Failed: ". $e->getMessage());
    }

    ?>
    <!--Qui accade la magia, jk e' javascript-->
    <script type="text/javascript">
        function InstantSubmit() {
            //Submit del form sottostante
            document.getElementById("myForm").submit(); 
        }  
    </script>
        
    <!--Si ritorna alla pagina dove sono elencati tutti gli eventi-->
    <form action="../CheckPage.php" id="myForm" method="post">

        <!--CheckPage richiede metodo POST, cosi come Username e Password. Quindi e' necessario passarle. Troppo tardi per usare una sessione :( -->
        <input type="hidden" name="creatore" value='<?php echo "$creatore" ?>'>
        <input type="hidden" name="password" value='<?php echo "$password" ?>'>

    </form>
    <?php

}else{
    header("Location:../LoginPage.php");
}
?>
</body>
 </html>