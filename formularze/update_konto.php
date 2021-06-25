<?php
session_start();
require "../klasy/administrator.php";

$admin = new Administrator();
if ($admin->add_user()) {
    header("Location: ../a_control_panel.php");
} else {
    echo "NIE UDALO SIE UTWORZYC REKORDU";
}


$polaczenie->close();
