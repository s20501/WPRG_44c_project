<?php
require "klasy/administrator.php";
session_start();
require "klasy/system.php";
czy_admin();
if (!isset($_SESSION['error_panel'])) {
    $_SESSION['error_panel'] = "";
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>">
    <title>Biblioteka</title>
</head>

<body>
    <nav class="navbar">
        <form class="form-inline">
            <button onclick='window.location.href="a_profil.php" ' class="btn btn-sm align-middle btn-outline-secondary" type="button">Profil</button>
            <button onclick='window.location.href="a_control_panel.php" ' class="btn btn-outline-success" type="button">Użytkownicy</button>
            <button onclick='window.location.href="a_control_panel_2.php" ' class="btn btn-sm align-middle btn-outline-secondary" type="button">Książki</button>
            <button onclick='window.location.href="a_control_panel_3.php" ' class="btn btn-sm align-middle btn-outline-secondary" type="button">Historia</button>
        </form>
    </nav>
    <div class="container">
        <form action="formularze/tabela_user.php" method="post">
            <?php
            $admin = new Administrator();
            //wypisuje zawartosc bazy danych
            $tabela_user = $admin->pokaz_baze_user();
            $_SESSION['admin'] = $admin;

            for ($m = 0; $m < count($tabela_user[4]); $m++) {
                if ($tabela_user[4][$m] == 0) {
                    $tabela_user[4][$m] = "Nie";
                } else {
                    $tabela_user[4][$m] = "Tak";
                }
            }

            echo "<h3>Tabela 'user'</h3> ";
            echo "<table class='table table-bordered'>
            <tr>
            <th>id</th><th>login</th><th>haslo</th><th>ilosc_wypozyczen</th><th>admin</th><th>Zaznacz</th>
            </tr>";
            for ($i = 0; $i < count($tabela_user[0]); $i++) {
                echo "<tr><td>" . $tabela_user[0][$i] . "</td><td>" . $tabela_user[1][$i] . "</td><td>" . $tabela_user[2][$i] . "</td><td>" . $tabela_user[3][$i] . "</td><td>" . $tabela_user[4][$i] . "
                </td><td>
                <div class='checkbox'>
                <input type='checkbox' class='form' name='tab_post[]' value='" . $tabela_user[1][$i] . "'>
              </div>
                </td></tr>";
            }

            echo "</table>";

            ?>
            <div class="error"><?php echo $_SESSION['error_panel']; ?></div>
            <div class="tlo">

                <input class="btn btn-default" type="submit" name="przycisk" value="Usuń" />

                <input class="btn btn-default" type="submit" name="przycisk" value="Daj admina" />
        </form>

    </div>
    </div>
</body>

</html>