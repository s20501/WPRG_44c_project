<?php
session_start();
if (!isset($_SESSION['error'])) {
  $_SESSION['error'] = "";
}
?>
<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>">
  <title>Biblioteka</title>
</head>

<body>
  <div class="container">
    <div class="jumbotron">
      <h1>Witaj na stronie Biblioteki!</h1>
      <form action="formularze/logowanie.php" method="post">
        Podaj login: <input type="text" name="login" />
        </br>
        Podaj hasło: <input type="password" name="haslo" />
        </br>
        <button class="btn btn-default" type="submit">Zaloguj</button>
      </form>
      <div class="separator"></div>
      <button class="btn btn-default" onclick='window.location.href = "rejestracja.php"'>Zajerestruj się</button>
      </br>
      <?php echo '<div class="error">' . $_SESSION['error'] . '</div>'; ?>
    </div>
</body>

</html>