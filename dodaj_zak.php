<?php
 session_start();

 require_once('funkcje_zakladki.php');

  // utworzenie kr�tkiej nazwy zmiennej
  $nowy_url = $_POST['nowy_url'];

  tworz_naglowek_html('Dodawanie zak�adek');

  try {
    sprawdz_prawid_uzyt();
    if (!wypelniony($_POST)) {
    throw new Exception('Formularz wype�niony niew�a�ciwie. Prosz� spr�bowa� ponownie.');
    }
    // sprawdzenie formatu URL-a
    if (strstr($nowy_url, 'http://') === false) {
       $nowy_url = 'http://'.$nowy_url;
    }

    // sprawdzenie prawid�owo�ci URL-a
    if (!(@fopen($nowy_url, 'r'))) {
       throw new Exception('URL nieprawid�owy.');
    }

    // pr�ba dodania zak�adki
    dodaj_zak($nowy_url);
    echo 'Zak�adka dodana.';

    // pobranie zak�adek zapisanych przez u�ytkownika
  if ($tablica_url = pobierz_urle_uzyt($_SESSION['prawid_uzyt'])) {
  wyswietl_urle_uzyt($tablica_url);
	}
  }
  catch (Exception $e) {
    echo $e->getMessage();
  }
  wyswietl_menu_uzyt();
  tworz_stopke_html();
?>