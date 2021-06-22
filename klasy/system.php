<?php
function czy_zalogowany()
{
    if (!isset($_SESSION['zalogowany'])) {
        header('Location: ../index.php');
    }
}

function czy_admin()
{
    if (!isset($_SESSION['zalogowany_admin'])) {
        header('Location: index.php');
    }
}
