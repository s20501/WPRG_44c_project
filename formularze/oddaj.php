<?php
require '../klasy/biblioteka.php';
require '../klasy/uzytkownik.php';
session_start();

$polka = $_SESSION['polka'];
$uzytkownik = $_SESSION['uzytkownik'];

//sprawdzam czy ksiazka jest dostepna
foreach($_POST['tab_post'] as $ksiazka)
{
    $dostepna = false;
    if(in_array($ksiazka,$uzytkownik->ksiazki))
    {
        $dostepna = true;
    }

if($dostepna)
{
    $_SESSION['dostepna2'] = '';
    //wypozyczam
    $polka->oddaj($ksiazka,$_SESSION['zalogowany']);

}
else
{
 $_SESSION['dostepna2'] = 'Nie masz wypożyczonej tej książki';
 header('Location: ../polka2.php');
}

}

header('Location: ../polka2.php');
?>