<?php

    class Uzytkownik
    {
        public $ksiazki, $termin, $ilosc=0;
        private $polaczenie, $uzytkownik;

        private function polacz()
        {
            require "connect.php";
            $this->polaczenie = @new mysqli($dbserwer, $dblogin,$dbpassword, $db);
            if($this->polaczenie->connect_errno!=0)
            {
                echo "Błąd połączenia z bazą";
            
            }   

        }
        public function __construct($uzytkownik)
        {
            $this->uzytkownik = $uzytkownik;
            $this->polacz();
            //pobieram tytul
            $rezultat =  $this->polaczenie->query("SELECT tytul FROM biblioteka WHERE wypozyczona='$uzytkownik'");
            if($rezultat->num_rows == 0)
            {
                $tab_tytul[0] = "Brak";
                
            }
            else
            {
                $i_a = 0;
                while($row = $rezultat->fetch_assoc()) {
                    $tab_tytul[$i_a] = $row['tytul'];
                    $i_a++;
                }
                //pobieram termin
                $rezultat = $this->polaczenie->query("SELECT termin FROM biblioteka WHERE wypozyczona='$uzytkownik'");
                $i_b=0;
                while($row = $rezultat->fetch_assoc()) {
                    $tab_termin[$i_b] = $row['termin'];
                    $i_b++;
                }  
                //pobieram ilosc
                $rezultat = $this->polaczenie->query("SELECT ilosc_wypozyczen FROM user WHERE login='$uzytkownik'");
                $row = $rezultat->fetch_assoc();
                $this->ilosc = $row["ilosc_wypozyczen"];
                              
                $this->ksiazki = $tab_tytul;
                $this->termin = $tab_termin;
            }
            $this->polaczenie->close();
        }

        public function ilosc_plus()
        {
            $this->polacz();
            $this->polaczenie->query("UPDATE user SET ilosc_wypozyczen = ilosc_wypozyczen + 1  WHERE login='$this->uzytkownik'");
            $this->polaczenie->close();
            
        }
    }
?>