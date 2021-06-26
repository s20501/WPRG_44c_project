<?php
session_start();
require "../klasy/administrator.php";

$admin = new Administrator();
if ($admin->update_book()) {
    header("Location: ../a_control_panel_2.php");
} else {
    echo "NIE UDALO SIE UTWORZYC REKORDU";
}
