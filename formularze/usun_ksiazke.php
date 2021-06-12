<?php
require "../klasy/administrator.php";
    session_start();
   $admin = $_SESSION["admin"];
   //usuwam ksiazke i sprawdzam czy dostepna
   if($admin->usun_book($_POST['ksiazka']))
   {
    $_SESSION['error_panel'] = "";
   }
   else
   {
    $_SESSION['error_panel'] = "Nie ma takiego id!";
   }
   header('Location: ../a_control_panel.php');

?>