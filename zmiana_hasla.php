<?php
  session_start();
  require_once('funkcje_zakladki.php');
  tworz_naglowek_html('Zmiana has�a');

  // utworzenie kr�tkich nazw zmiennych
  $stare_haslo = $_POST['stare_haslo'];
  $nowe_haslo = $_POST['nowe_haslo'];
  $nowe_haslo2 = $_POST['nowe_haslo2'];


 try {
   sprawdz_prawid_uzyt();
    if (!wypelniony($_POST)) {
       throw new Exception('Formularz nie zosta� wype�niony ca�kowicie. Prosz� spr�bowa� ponownie.');
    }

    if ($nowe_haslo != $nowe_haslo2) {
       throw new Exception('Wprowadzone has�a nie s� identyczne. Has�o nie zosta�o zmienione.');
    }

    if ((strlen($nowe_haslo) > 16) || (strlen($nowe_haslo) < 6)) {
       throw new Exception('Nowe has�o musi mie� d�ugo�� co najmniej 6 i maksymalnie 16 znak�w. Prosz� spr�bowa� ponownie.');
    }

    // pr�ba uaktualnienia
    zmien_haslo($_SESSION['prawid_uzyt'], $stare_haslo, $nowe_haslo);
    echo 'Has�o zmienione.';
 }
 catch (Exception $e) {
    echo $e->getMessage();
 }
 wyswietl_menu_uzyt();
 tworz_stopke_html();
?>