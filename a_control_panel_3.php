<!DOCTYPE HTML>
<?php
session_start();
require "klasy/system.php";
czy_admin();
if (!isset($_SESSION['historia'])) {
    $_SESSION['historia'] = NULL;
}
?>
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
            <button onclick='window.location.href="a_control_panel.php" ' class="btn btn-sm align-middle btn-outline-secondary" type="button">Użytkownicy</button>
            <button onclick='window.location.href="a_control_panel_2.php" ' class="btn btn-sm align-middle btn-outline-secondary" type="button">Książki</button>
            <button onclick='window.location.href="a_control_panel_3.php" ' class="btn btn-outline-success" type="button">Historia</button>
        </form>
    </nav>
    <div class="container">
        <h3>Wybierz użytkownika którego historie chcesz wyświetlić:</h3>
        <div style="width: 100%;" class="tlo">
            <form action="formularze/historia.php" method="post">
                <?php
                require "klasy/administrator.php";
                $admin = new Administrator();
                $tab = $admin->pokaz_baze_user();
                // wypisuje klawisze
                foreach ($tab[1] as $user) {
                    echo "<input class='btn btn-default' type='submit' name='przycisk' value='" . $user . "' />";
                    echo "&nbsp;";
                }
                ?>
            </form>
        </div>
        </br> </br>
        <table class='table table-bordered'>
            <tr>
                <th>Akcja</th>
                <th>Data</th>
                <th>Książka</th>
            </tr>
            <?php
            $tab_historia = $_SESSION['historia'];
            if ($tab_historia[0] != NULL) {
                for ($i = 0; $i < count($tab_historia[0]); $i++) {
                    echo "<tr><td>" . $tab_historia[0][$i] . "</td><td>" . $tab_historia[1][$i] . "</td><td>" . $tab_historia[2][$i] . "</td></tr>";
                }
            }

            ?>
        </table>


    </div>
</body>

</html>