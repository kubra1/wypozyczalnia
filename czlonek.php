<?php

session_start();

// do��czenie plik�w funkcji tej aplikacji
require_once('funkcje_zakladki.php');

// utworzenie kr�tkich nazw zmiennych
@ $nazwa_uz = $_POST['nazwa_uz'];
@ $haslo = $_POST['haslo'];

if ($nazwa_uz && $haslo) {
// w�a�nie nast�pi�a pr�ba logowania
  try {
    loguj($nazwa_uz, $haslo);
    // je�eli u�ytkownik znajduje si� w bazie danych rejestracja identyfikatora
    $_SESSION['prawid_uzyt'] = $nazwa_uz;
  }
  catch (Exception $e) {
    // niepomy�lne logowanie
    tworz_naglowek_html('Problem:');
    echo 'Zalogowanie niemo�liwe.
          Nale�y by� zalogowanym aby ogl�da� t� stron�.';
    tworz_HTML_URL('logowanie.php', 'Logowanie');
    tworz_stopke_html();
    exit;
  }
}

tworz_naglowek_html('Strona g��wna');
sprawdz_prawid_uzyt();
// odczytanie zak�adek u�ytkownika
if ($tablica_url = pobierz_urle_uzyt($_SESSION['prawid_uzyt'])) {
  wyswietl_urle_uzyt($tablica_url);
}

// tworzenie menu opcji
wyswietl_menu_uzyt();

tworz_stopke_html();
?>
