<?php
require '../klasy/biblioteka.php';
require '../klasy/uzytkownik.php';
session_start();

$polka = $_SESSION['polka'];
$user = new uzytkownik($_SESSION['zalogowany']);

foreach($_POST['tab_post'] as $ksiazka)
{


//sprawdzam czy ksiazka jest dostepna
$dostepna = false;

if(in_array($ksiazka, $polka->ksiazki))
{
    $dostepna = true;
}

if($dostepna)
{
    $_SESSION['dostepna'] = '';
    //wypozyczam
    $polka->pozycz($ksiazka,$_SESSION['zalogowany']);
    $user->ilosc_plus();
   

}
else
{
 $_SESSION['dostepna'] = 'Ta ksiazka jest nie dostepna';
 header('Location: ../polka.php');
}

}

header('Location: ../polka.php');
?>