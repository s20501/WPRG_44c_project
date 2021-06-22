
<?php
require "../klasy/connect.php";
session_start();

//Pobieram dane z formularza 
$login = $_POST['login'];
$haslo = $_POST['haslo'];

$polaczenie = @new mysqli($dbserwer, $dblogin, $dbpassword, $db);

//sprawdzam czy polaczylem sie z baza danych
if ($polaczenie->connect_errno != 0) {
    echo "Błąd połączenia z bazą";
}
//jesli tak sprawdzam haslo i login
else {
    $rezultat = @$polaczenie->query("SELECT * FROM user WHERE login='$login' AND haslo='$haslo'");
    if ($rezultat->num_rows > 0) {
        //sprawdam czy admin
        $rezultat = @$polaczenie->query("SELECT * FROM user WHERE login='$login' AND haslo='$haslo' AND admin=1");
        if ($rezultat->num_rows > 0) {
            header('Location: ../a_profil.php');
            $_SESSION['zalogowany_admin'] = $login;
        } else {
            header('Location: ../profil.php');
        }
        $_SESSION['zalogowany'] = $login;
        $_SESSION['error'] = "";
    } else {
        $_SESSION['error'] = "Zły login lub hasło";
        header('Location: ../index.php');
    }


    $polaczenie->close();
}
?>
