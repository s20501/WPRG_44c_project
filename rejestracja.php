<!DOCTYPE HTML>
<html>
 <head>
    <meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script  type="text/javascript" src="js/rejestracja.js"> </script>
	<title>Biblioteka</title>
 </head>
 <body>
<div class="container">
   <div class = "tlo">
    <form id="form" action="formularze/stworz_konto.php" method="post"> 
        Login:</br> <input id="login" type="text" name="login" />
        </br>
        Hasło</br> <input id="haslo1" type="password" name="haslo" />
        </br>
        Powtórz hasło</br> <input id="haslo2" type="password"/>
        </br>
        *hasło musi mieć minimalne 6 znaków </br>
        *login musi mieć od 3-14 znakow
        <div class="separator"></div>
    </form>
    <button class="btn btn-default" id="submit">Załóż konto</button></br>
    <div class="separator"></div>
    <a href="index.php" class="btn btn-default" role="button"><-</a>   
    <div id="error" class="error"></div>
</div>
 </body>
</html>