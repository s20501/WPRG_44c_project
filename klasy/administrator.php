<?php

class Administrator
{
    private $polaczenie, $tab_ksiazki, $tab_user;

    private function polacz()
    {
        require "connect.php";
        $this->polaczenie = @new mysqli($dbserwer, $dblogin, $dbpassword, $db);
        if ($this->polaczenie->connect_errno != 0) {
            echo "Błąd połączenia z bazą";
        }
    }
    //funkcja zamieniajaca rezultat z bazy na tablice
    private function przekonwertuj($nazwa, $tablica, $login = 'brak')
    {
        if ($login == 'brak') {
            $rezultat = $this->polaczenie->query("SELECT $nazwa FROM $tablica");
        } else {
            $rezultat = $this->polaczenie->query("SELECT $nazwa FROM $tablica WHERE login='$login'");
        }
        $i_k = 0;
        while ($row = $rezultat->fetch_assoc()) {
            $tab[$i_k] = $row[$nazwa];
            $i_k++;
        }
        return $tab;
    }

    //tabela user
    public function usun_user($uzytkownik)
    {
        if (in_array($uzytkownik, $this->tab_user[1])) {
            $this->polacz();
            $this->polaczenie->query("DELETE FROM user WHERE login='$uzytkownik'");
            $this->polaczenie->close();
            return true;
        } else {
            return false;
        }
    }

    public function daj_admin($uzytkownik)
    {
        if (in_array($uzytkownik, $this->tab_user[1])) {
            $this->polacz();
            $this->polaczenie->query("UPDATE user SET admin=1 WHERE login='$uzytkownik'");
            $this->polaczenie->close();
            return true;
        } else {
            return false;
        }
    }
    //tabela ksiazki
    public function usun_book($book_id)
    {
        if (in_array($book_id, $this->tab_ksiazki[0])) {
            $this->polacz();
            $this->polaczenie->query("DELETE FROM biblioteka WHERE id='$book_id'");
            $this->polaczenie->close();
            return true;
        } else {
            return false;
        }
    }

    public function przedluz_termin($ksiazka)
    {
        $this->polacz();
        $rezultat = $this->polaczenie->query("SELECT * FROM biblioteka WHERE id='$ksiazka' AND rezerwacja!='nie'");
        //sprawdzam czy rezultat jest pusty
        if ($rezultat->num_rows > 0) {
            $this->polaczenie->query("UPDATE biblioteka SET termin=curdate() + INTERVAL 14 DAY WHERE id='$ksiazka'");
            $this->polaczenie->close();
            return true;
        } else {
            $this->polaczenie->close();
            return false;
        }
    }
    //Historia
    public function pokaz_historie($user)
    {
        $this->polacz();
        $tab_akcja = $this->przekonwertuj("akcja", "historia", $user);
        $tab_data = $this->przekonwertuj("data", "historia", $user);
        $tab_tytul = $this->przekonwertuj("tytul", "historia", $user);
        $this->polaczenie->close();
        $tab = array($tab_akcja, $tab_data, $tab_tytul);
        return $tab;
    }
    //pobiera cala tabele biblioteka z bazy danych
    public function pokaz_baze_ksiazek()
    {
        $this->polacz();
        $tab_id = $this->przekonwertuj("id", "biblioteka");
        $tab_tytul = $this->przekonwertuj("tytul", "biblioteka");
        $tab_wypozyczona = $this->przekonwertuj("rezerwacja", "biblioteka");
        $tab_autor = $this->przekonwertuj("autor", "biblioteka");
        $tab_termin = $this->przekonwertuj("termin", "biblioteka");
        $tab_rok_wydania = $this->przekonwertuj("rok_wydania", "biblioteka");
        $tab_wydawnictwo = $this->przekonwertuj("wydawnictwo", "biblioteka");
        $tab_streszczenie = $this->przekonwertuj("streszczenie", "biblioteka");
        $tab_ISBN = $this->przekonwertuj("ISBN", "biblioteka");
        $tab_gatunek = $this->przekonwertuj("gatunek", "biblioteka");


        $this->polaczenie->close();
        $tab = array(
            $tab_id, $tab_tytul, $tab_wypozyczona, $tab_autor,
            $tab_termin, $tab_rok_wydania, $tab_wydawnictwo, $tab_streszczenie, $tab_ISBN, $tab_gatunek
        );
        $this->tab_ksiazki = $tab;
        return $tab;
    }
    //pobiera cala tabele user z bazy danych
    public function pokaz_baze_user()
    {
        $this->polacz();
        $tab_id = $this->przekonwertuj("id", "user");
        $tab_login = $this->przekonwertuj("login", "user");
        $tab_haslo = $this->przekonwertuj("haslo", "user");
        $tab_ilosc = $this->przekonwertuj("ilosc_wypozyczen", "user");
        $tab_admin = $this->przekonwertuj("admin", "user");
        $this->polaczenie->close();
        $tab = array($tab_id, $tab_login, $tab_haslo, $tab_ilosc, $tab_admin);
        $this->tab_user = $tab;
        return $tab;
    }
    // Dodaje książkę
    public function dodaj_book()
    {
        $this->polacz();
        if ($this->polaczenie->query("INSERT INTO biblioteka (rezerwacja, tytul, autor,wydawnictwo,rok_wydania,ISBN,gatunek,streszczenie)
        VALUES ('nie','" . $_POST['tytul'] . "','" . $_POST['autor']
            . "','" . $_POST['wydawnictwo'] . " ','" . $_POST['rok_wydania'] . "','" . $_POST['ISBN']
            . "','" . $_POST['gatunek'] . "','" . $_POST['streszczenie'] . "')")) {
            $this->polaczenie->close();
            return true;
        } else {
            $this->polaczenie->close();
            return false;
        }
    }
    // Get user
    public function get_user($id)
    {
        $this->polacz();
        $result = $this->polaczenie->query("SELECT * FROM user WHERE id=$id");
        $row = $result->fetch_row();
        $this->polaczenie->close();
        return $row ?? false;
    }

    public function update_user()
    {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
        $id = $_SESSION['id'];

        $this->polacz();

        if ($this->polaczenie->query("UPDATE  user  SET  login='" . $login . "', haslo='" . $haslo . "'
    WHERE  id=" . $id)) {
            return true;
        } else {
            return false;
        }
    }

    public function update_book()
    {
        $this->polacz();
        if ($this->polaczenie->query("UPDATE  biblioteka SET tytul='" . $_POST['tytul'] . "', autor='" . $_POST['autor']
            . "',wydawnictwo='" . $_POST['wydawnictwo'] . "',rok_wydania='" . $_POST['rok_wydania'] . "',ISBN='" . $_POST['ISBN']
            . "',gatunek='" . $_POST['gatunek'] . "',streszczenie='" . $_POST['streszczenie'] . "',rezerwacja='" . $_POST['rezerwacja'] . "'
             WHERE id = " . $_SESSION['id'])) {
            $this->polaczenie->close();
            return true;
        } else {
            $this->polaczenie->close();
            return false;
        }
    }

    public function get_book($id)
    {
        $this->polacz();
        $result = $this->polaczenie->query("SELECT * FROM biblioteka WHERE id=$id");
        $row = $result->fetch_row();
        $this->polaczenie->close();
        return $row ?? false;
    }
}
