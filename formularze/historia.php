<?php
require "../klasy/administrator.php" ;
session_start();

$wybor = $_POST['przycisk'];
$admin = New Administrator();
$_SESSION['historia'] = $admin->pokaz_historie($wybor);
header('Location: ../a_control_panel_3.php');




?>