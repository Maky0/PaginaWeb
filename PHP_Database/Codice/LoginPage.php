<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <br>
    
    <h3>Calendario Eventi</h3>
        

    <div class="pazienti login">
    <form action="CheckPage.php" method="post">
        <style>
            .coolLabel{
                display: inline-block;
                margin-right: 125px;
                padding-bottom: 10px;
            }
        </style>

        <!--Label e input per il login-->
        <!--<label class="coolLabel">Username:</label><br> ///Label commentati per scelta di stile-->
        <input type="text" name="creatore" placeholder="Username" class="input"><br>

        <!--<label class="coolLabel">Password:</label><br>-->

        <!--Input type passford fa sia che l'input sia dei pallini-->
        <input type="password" name="password" placeholder="Password" class="input"><br>

        <button type="submit" class="button-19 animationTopBottom" role="button">Login</button >

    </form>
    </div>
        <br><br>

    <!--Pulsante Registrazione-->
    <form action="RegisterPage.php" method="post">

        <button name="Register" class="button-19">Register</button>

    </form>

</body>
</html>