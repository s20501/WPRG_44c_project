<!DOCTYPE HTML>
<?php require 'klasy/uzytkownik.php' ?>

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
  <button onclick='window.location.href="profil.php" ' class="btn btn-outline-success" type="button">Profil</button>
    <button onclick='window.location.href="polka.php" ' class="btn btn-sm align-middle btn-outline-secondary" type="button">Wypożycz</button>
    <button onclick='window.location.href="polka2.php" ' class="btn btn-sm align-middle btn-outline-secondary" type="button">Oddaj</button>
  </form>
</nav>
    <div class="container"> 
    <?php
    session_start();
    echo  "Witaj ".$_SESSION['zalogowany']."</br>";
    echo "Dzisiaj jest ".date('y-m-d')."</br></br>";
    $uzytkownik = new Uzytkownik($_SESSION['zalogowany']);
    $_SESSION['uzytkownik'] = $uzytkownik;
    //wypisuje statystyki

    $data_czas = new DateTime();
    $po_terminie=0;
    for($i=0;$i<count($uzytkownik->termin);$i++)
    {
        $koniec = DateTime::createFromFormat('Y-m-d',$uzytkownik->termin[$i]);
        if($data_czas > $koniec)
        {
            $po_terminie++;
        }
    }
        
    echo "<h3>Statystyki</h3><ul>";
    echo "<li>Liczba wypożyczonych obecnie książek: ".count($uzytkownik->ksiazki)."</li>";
    echo "<li>Liczba książek po terminie do oddania: ".$po_terminie."</li>";
    echo "<li> Wypożyczyłeś w naszej bibliotece książke już ".$uzytkownik->ilosc." razy"; 

    ?>
        

    </br>
    </br>
    <a href="formularze/logout.php">Wyloguj się</a>
    </div>
    
 </body>
</html>