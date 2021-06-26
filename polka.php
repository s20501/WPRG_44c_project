<!DOCTYPE HTML>
<?php
require 'klasy/biblioteka.php';
require "klasy/system.php";

session_start();
czy_zalogowany();

if (!isset($_SESSION['dostepna'])) {
  $_SESSION['dostepna'] = "";
}
?>

<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <title>Biblioteka</title>
</head>

<body>

  <nav class="navbar">
    <form class="form-inline">
      <button onclick='window.location.href="profil.php" ' class="btn btn-sm align-middle btn-outline-secondary" type="button">Profil</button>
      <button onclick='window.location.href="polka.php" ' class="btn btn-outline-success" type="button">Zarezerwuj</button>
      <button onclick='window.location.href="polka2.php" ' class="btn btn-sm align-middle btn-outline-secondary" type="button">Usuń rezerwację</button>
    </form>
  </nav>
  <div class="container">
    <h3>Lista dostępnych książek</h3>
    <form action="formularze/wypozycz.php" method="post">
      <table class="table table-bordered">
        <tr>
          <th>Tytul</th>
          <th>Autor</th>
          <th>Gatunek</th>
          <th>Zarezerwuj</th>
        </tr>
        <?php
        $polka = new Biblioteka();
        $_SESSION['polka'] = $polka;
        //Wypisuje wszystkie wolne ksiazki   
        for ($i = 0; $i < count($polka->ksiazki); $i++) {
          echo "<tr><td>" . $polka->ksiazki[$i] . "</td><td>" . $polka->autorzy[$i] . "</td><td>" . $polka->gatunki[$i] . "</td><td>
        <div class='checkbox'>
        <input type='checkbox' class='form' name='tab_post[]' value='" . $polka->ksiazki[$i] . "'>
      </div>
        </td></tr>";
        }
        ?>
      </table>
      <!-- Sprawdzam czy ksiazki sa dostepne -->
      <div class="tlo">

        <button class="btn btn-default" type="submit">Zarezerwuj</button>
      </div>
    </form>
    <div class="error"><?php echo $_SESSION['dostepna']; ?></div>
  </div>
</body>

</html>