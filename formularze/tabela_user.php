<?php
require "../klasy/administrator.php";

session_start();
$admin = $_SESSION["admin"];

//sprawdzam ktory przycisk zostal klikniety
if ($_POST['przycisk'] == "Usuń") {
  //usuwam usera i sprawdzam czy dostepna
  foreach ($_POST['tab_post'] as $user) {
    if ($admin->usun_user($user)) {
      $_SESSION['error_panel'] = "";
    } else {
      $_SESSION['error_panel'] = "Nie ma takiego użytkownika!";
      header('Location: ../a_control_panel.php');
    }
  }
  header('Location: ../a_control_panel.php');
} else if ($_POST['przycisk'] == "Daj admina") {
  //sprawdzam czy taki uzytkownik jest dostepny i daje admina
  foreach ($_POST['tab_post'] as $user) {
    if ($admin->daj_admin($user)) {
      $_SESSION['error_panel'] = "";
    } else {
      $_SESSION['error_panel'] = "Nie ma takiego użytkownika!";
      header('Location: ../a_control_panel.php');
    }
  }
  header('Location: ../a_control_panel.php');
} else if (isset($_POST['id'])) {
  $_SESSION['id'] = $_POST['id'];
  header('Location: ../edycja_user.php');
} else {
  echo "Cos poslo nie tak";
}
