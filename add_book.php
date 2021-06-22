<!DOCTYPE HTML>
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
        <div class="row tlo">
            <form id="form" class="col-12" action="formularze/stworz_ksiazke.php" method="post">
                Tytuł</br> <input id="tytul" type="text" name="tytul" />
                </br>
                Autor</br> <input id="autor" type="text" name="autor" />
                </br>
                Wydawnictwo</br> <input id="wydawnictwo" type="text" name="wydawnictwo" />
                </br>
                Rok Wydania </br> <input id="rok_wydania" type="date" name="rok_wydania" />
                </br>

                Streszczenie </br> <textarea id="streszczenie" name="streszczenie"> </textarea>
                </br>

                ISBN </br> <input id="ISBN" type="text" name="ISBN" />
                </br>

                Gatunek </br> <input id="gatunek" type="text" name="gatunek" />
                </br>

                <div class="separator"></div>

                <div class="col-12">
                    <a href="a_control_panel_2.php" class="btn btn-default" role="button">
                        <- </a>
                            <button class="btn btn-default" id="submit">Dodaj książkę</button>

                </div>
            </form>


        </div>
    </div>
</body>

</html>