<?php
require "../klasy/administrator.php";
session_start();
$admin = $_SESSION["admin"];

if (
    isset($_POST["tytul"]) && isset($_POST["autor"]) && isset($_POST["wydawnictwo"])
    && isset($_POST["rok_wydania"]) && isset($_POST["ISBN"]) && isset($_POST["gatunek"])
) {
    if ($admin->dodaj_book()) {
        $_SESSION['error_panel2'] = "";
    } else {
        $_SESSION['error_panel2'] = "Błąd dodawania książki!";
    }
} else {
    $_SESSION['error_panel2'] = "Źle wypełnione pola";
}

header('Location: ../a_control_panel_2.php');
