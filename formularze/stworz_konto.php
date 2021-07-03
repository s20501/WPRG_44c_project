<?php
$login = $_POST['login'];
$haslo = $_POST['haslo'];
require "../klasy/connect.php";

$polaczenie = @new mysqli($dbserwer, $dblogin,$dbpassword, $db);
if($polaczenie->connect_errno!=0)
{
    echo "Błąd połączenia z bazą";
}

$rezultat =$polaczenie->query("SELECT * FROM user WHERE login='$login'");
//sprawdzam czy rezultat jest pusty
if($rezultat->num_rows > 0)
{
    echo "taki użytkownik już instnieje";
}
else 
{
    if($polaczenie->query("INSERT INTO user (login, haslo,ilosc_wypozyczen)
    VALUES ('$login', '$haslo', 0)") === FALSE)
    {
        echo "NIE UDAlO SIe UTWORZYC REKORDU";
    }
    else
    {
        header("Location: ../index.php");
    }
}

$polaczenie->close();
