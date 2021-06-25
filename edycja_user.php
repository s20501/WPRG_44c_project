<!DOCTYPE HTML>
<?php
require "klasy/administrator.php";
session_start();
require "klasy/system.php";
czy_admin();
if (!isset($_SESSION['error_panel'])) {
    $_SESSION['error_panel'] = "";
}

$admin = new Administrator();
$user =  $admin->get_user($_SESSION['id'])

?>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Biblioteka</title>
</head>

<body>
    <div class="container">
        <div class="tlo">
            <form id="form" action="formularze/update_konto.php" method="post">
                Login:</br> <input id="login" type="text" name="login" <?php echo "value='" . $user[1] . "'" ?> />
                </br>
                Hasło</br> <input id="haslo1" type="password" name="haslo" <?php echo "value='" . $user[2] . "'" ?> />
                </br>
                <div class="separator"></div>
                <button class="btn btn-default" id="submit" type="submit">Zaktualizuj konto</button></br>

            </form>
            <div class="separator"></div>
            <a href="a_control_panel.php" class="btn btn-default" role="button">
                <- </a>
                    <div id="error" class="error"></div>
        </div>
</body>

</html>