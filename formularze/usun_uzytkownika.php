<?php
require "../klasy/administrator.php";
    session_start();
   $admin = $_SESSION["admin"];
   //usuwam usera i sprawdzam czy dostepna
   if($admin->usun_user($_POST['uzytkownik']))
   {
    $_SESSION['error_panel'] = "";
   }
   else
   {
    $_SESSION['error_panel'] = "Nie ma takiego użytkownika!";
   }
   header('Location: ../a_control_panel.php');

?>