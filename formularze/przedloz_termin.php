<?php
require "../klasy/administrator.php";
    session_start();
   $admin = $_SESSION["admin"];
   //usuwam ksiazke i sprawdzam czy dostepna
   if($admin->przedluz_termin($_POST['uzytkownik'],$_POST['ksiazka']))
   {
    $_SESSION['error_panel'] = "";
   }
   else
   {
    $_SESSION['error_panel'] = "Nie ma takiego użytkownika lub książki!";
   }
   header('Location: ../a_control_panel.php');

?>