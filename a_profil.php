
<?php
    require "klasy/administrator.php";
    $admin = New Administrator();
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
 <nav class="navbar">
  <form class="form-inline">
  <button onclick='window.location.href="a_profil.php" ' class="btn btn-outline-success" type="button">Profil</button>   
  <button onclick='window.location.href="a_control_panel.php" ' class="btn btn-sm align-middle btn-outline-secondary" type="button">Użytkownicy</button>
  <button onclick='window.location.href="a_control_panel_2.php" ' class="btn btn-sm align-middle btn-outline-secondary" type="button">Książki</button>
  <button onclick='window.location.href="a_control_panel_3.php" ' class="btn btn-sm align-middle btn-outline-secondary" type="button">Historia</button>
  </form>
</nav>
    <div class="container">
    <?php
        session_start();
        echo  "Witaj ".$_SESSION['zalogowany']."</br>";
        echo "Masz uprawnienia administratora </br>";
        echo "Dzisiaj jest ".date('y-m-d')."</br></br>";
        echo "<h3>Statystyki</h3><ul>";
        $tab = $admin->pokaz_baze_ksiazek();
        echo "<li>Ilość książek w bibliotece: ".count($tab[0])."</li>";
        $tab = $admin->pokaz_baze_user();
        echo "<li>Ilość użytkowników: ".count($tab[0])."</li></ul>";         
    ?>

    <a href="formularze/logout.php">Wyloguj się</a>
    </div>
 </body>
</html>