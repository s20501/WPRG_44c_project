<?php 
require "klasy/administrator.php";
  session_start();
  if (!isset($_SESSION['error_panel2']))
    {
        $_SESSION['error_panel2'] = "";
        
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
 <nav class="navbar">
  <form class="form-inline">
  <button onclick='window.location.href="a_profil.php" ' class="btn btn-sm align-middle btn-outline-secondary" type="button">Profil</button>
  <button onclick='window.location.href="a_control_panel.php" ' class="btn btn-sm align-middle btn-outline-secondary" type="button">Użytkownicy</button>
  <button onclick='window.location.href="a_control_panel_2.php" ' class="btn btn-outline-success" type="button">Książki</button>
  <button onclick='window.location.href="a_control_panel_3.php" ' class="btn btn-sm align-middle btn-outline-secondary" type="button">Historia</button>
  </form>
</nav>
    <div class="container">
        <form action="formularze/tabela_ksiazki.php" method="post">
        <?php
            $admin = new Administrator();
            //wypisuje zawartosc bazy danych
            $tabela_ksiazek = $admin->pokaz_baze_ksiazek();
            $_SESSION['admin'] = $admin;
            echo "<h3>Tabela 'ksiazki'</h3> ";
            echo "<table class='table table-bordered'>
            <tr>
            <th>id</th><th>tytul</th><th>wypozyczona</th><th>autor</th><th>termin</th><th>Zaznacz</th>
            </tr>";
            for($i=0; $i<count($tabela_ksiazek[0]);$i++)
            {
                echo "<tr><td>".$tabela_ksiazek[0][$i]."</td><td>".$tabela_ksiazek[1][$i]."</td><td>".$tabela_ksiazek[2][$i]."</td><td>".$tabela_ksiazek[3][$i]."</td><td>".$tabela_ksiazek[4][$i]."
                </td><td>
                <div class='checkbox'>
                <input type='checkbox' class='form' name='tab_post[]' value='".$tabela_ksiazek[0][$i]."'>
              </div>
                </td></tr>";
            }
            
             echo "</table>";
                        
        ?>
        <div class="error"><?php echo $_SESSION['error_panel2'];?></div>
        <div class="tlo">
        
        <input class="btn btn-default" type="submit" name="przycisk" value="Usuń" />
        
        <input class="btn btn-default" type="submit" name="przycisk" value="Przedłóż termin" />
        </form>
        </div>
    </div>
 </body>
</html>