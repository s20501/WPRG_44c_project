<!DOCTYPE HTML>
<?php
require 'klasy/uzytkownik.php';
require 'klasy/biblioteka.php';
require "klasy/system.php";

session_start();
czy_zalogowany();
if (!isset($_SESSION['dostepna2'])) {
  $_SESSION['dostepna2'] = "";
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
      <button onclick='window.location.href="polka.php" ' class="btn btn-sm align-middle btn-outline-secondary" type="button">Zarezerwuj</button>
      <button onclick='window.location.href="polka2.php" ' class="btn btn-outline-success" type="button">Usuń rezerwację</button>

    </form>
  </nav>
  <div class="container">
    <h3>Książki które zarazerwowałeś</h3>
    <form action="formularze/oddaj.php" method="post">
      <?php
      $uzytkownik = new Uzytkownik($_SESSION['zalogowany']);
      $_SESSION['uzytkownik'] = $uzytkownik;
      $polka = new Biblioteka;
      $_SESSION['polka'] = $polka;
      echo '<table class="table table-bordered">
   <tr><th>Tytul</th><th>Termin do odbioru</th><th>Usuń rezerwację</th><tr/>';
      $data_czas = new DateTime();

      if (isset($uzytkownik->ksiazki)) {

        for ($i = 0; $i < count($uzytkownik->ksiazki); $i++) {
          $koniec = DateTime::createFromFormat('Y-m-d', $uzytkownik->termin[$i]);
          if ($data_czas <= $koniec) {
            echo "<tr><td>" . $uzytkownik->ksiazki[$i] . "</td><td>" . $uzytkownik->termin[$i] . "</td><td>

       <div class='checkbox'>
       <input type='checkbox' class='form' name='tab_post[]' value='" . $uzytkownik->ksiazki[$i] . "'>
       </div>
       </td></tr>";
          } else {
            echo "<tr><td>" . $uzytkownik->ksiazki[$i] . "</td><td class='error'>PRZEKROCZONO TERMIN</td><td>
           
                  <div class='checkbox'>
                  <input type='checkbox' class='form' name='tab_post[]' value='" . $uzytkownik->ksiazki[$i] . "'>
                  </div>
                  </td></tr>";
          }
        }
      }
      ?>
      </table>
      <!-- Sprawdzam czy ksiazki sa dostepne -->
      <div class="tlo">
        <button class="btn btn-default" type="submit">Usuń rezerwację</button>
      </div>
    </form>
    <div class="error"><?php echo $_SESSION['dostepna2']; ?></div>
  </div>
</body>

</html>