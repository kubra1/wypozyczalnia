<?php
  require_once("funkcje_zakladki.php");
  tworz_naglowek_html("Ustawianie has�a");

  // utworzenie kr�tkiej nazwy zmiennej
  $nazwa_uz = $_POST['nazwa_uz'];

  try {
     $haslo=ustaw_haslo($nazwa_uz);
     powiadom_haslo($nazwa_uz, $haslo);
     echo 'Nowe has�o zosta�o przes�ane na adres poczty elektronicznej.<br />';
  }
  catch (Exception $e) {
     echo 'Has�o nie mog�o zosta� ustawione. Prosz� spr�bowa� p�niej.';
  }
  tworz_HTML_URL('logowanie.php', 'Logowanie');
  tworz_stopke_html();
?>