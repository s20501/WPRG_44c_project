<?php

require "../klasy/administrator.php";
session_start();
$admin = $_SESSION["admin"];
//przyciks usun
if ($_POST['przycisk'] == "Usuń") {
    foreach ($_POST['tab_post'] as $book) {
        if ($admin->usun_book($book)) {
            $_SESSION['error_panel2'] = "";
        } else {
            $_SESSION['error_panel'] = "Nie ma takiego id!";
            header('Location: ../a_control_panel_2.php');
        }
    }
    header('Location: ../a_control_panel_2.php');
}
//przycisk przedloz termin
else if ($_POST["przycisk"] == "Przedłóż termin") {
    foreach ($_POST['tab_post'] as $book) {
        if ($admin->przedluz_termin($book)) {
            $_SESSION['error_panel2'] = "";
        } else {
            $_SESSION['error_panel'] = "Nie ma takiej książki lub nie jest wypożyczona";
            header('Location: ../a_control_panel_2.php');
        }
    }
    header('Location: ../a_control_panel_2.php');
} else if ($_POST["przycisk"] == "Dodaj książke") {

    header('Location: ../a_add_book.php');
} else {
    echo "Cos poszlo nie tak";
}
