<!DOCTYPE html>
<html>   
<head>
    <title>Registra</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
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
   

    <h3>Registra Utente</h3>

    <!--Form per inserire dati nuovo utente-->
    <form action="includes/registerhandler.inc.php" method="post">

        <input type="text" name="nome" placeholder="Username" class="input"><br/>

        <!--Pallini con password-->
        <input type="password" name="password" placeholder="Password" class="input"><br/>

        <button type="submit" name="Register" class="button-19">Register</button>
    </form>
</body>
</html>