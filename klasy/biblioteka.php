<?php
class Biblioteka
{
    public $ksiazki, $autorzy;
    private $polaczenie;

    //lacze z baza danych 
    private function polacz()
    {
    require "connect.php";
    $this->polaczenie = @new mysqli($dbserwer, $dblogin,$dbpassword, $db);
    if($this->polaczenie->connect_errno!=0)
    {
        echo "Błąd połączenia z bazą";
    }

    }

    public function __construct()
    {
        $this->polacz();
        //pobieram liste dostepnych ksiazek
            $rezultat = $this->polaczenie->query("SELECT tytul FROM biblioteka WHERE wypozyczona='nie'");
            if($rezultat->num_rows > 0)
            {
            $i_k = 0;
            while($row = $rezultat->fetch_assoc()) {
                $tab_ksiazki[$i_k] = $row['tytul'];
                $i_k++;
            }
            $this->ksiazki=$tab_ksiazki;
            }
            

            //pobieram liste autorow dostepnych ksiazek
            $rezultat = $this->polaczenie->query("SELECT autor FROM biblioteka WHERE wypozyczona='nie'");
            if($rezultat->num_rows >0)
            {
            $i_a = 0;
            while($row = $rezultat->fetch_assoc()) {
                $tab_autor[$i_a] = $row['autor'];
                $i_a++;
            }
            $this->autorzy=$tab_autor;
            }  
            $this->polaczenie->close();
    }

    public function pozycz($ksiazka,$kto)
    {
        $this->polacz();
        //wstawiam nazwe uzytkownika i date
        $this->polaczenie->query("UPDATE biblioteka SET termin=curdate() + INTERVAL 14 DAY WHERE tytul='$ksiazka' AND wypozyczona='nie'" );        
        $this->polaczenie->query("UPDATE biblioteka SET wypozyczona='$kto' WHERE tytul='$ksiazka' AND wypozyczona='nie'");
        //wstawiam wpis do histori
        $this->polaczenie->query("INSERT INTO historia (akcja, data, login, tytul) VALUES ('wypożyczono', curdate(),'$kto','$ksiazka')");
        $this->polaczenie->close();

    }

    public function oddaj($ksiazka,$kto)
    {
        $this->polacz();
        //usuwam termin
        $this->polaczenie->query("UPDATE biblioteka SET termin=NULL WHERE tytul='$ksiazka' AND wypozyczona='$kto'");
        $this->polaczenie->query("UPDATE biblioteka SET wypozyczona='nie' WHERE tytul='$ksiazka' AND wypozyczona='$kto'");
        //wstawiam wpis do histori
        $this->polaczenie->query("INSERT INTO historia (akcja, data, login, tytul) VALUES ('oddano', curdate(),'$kto','$ksiazka')");
        $this->polaczenie->close();

    }
}


     ?>