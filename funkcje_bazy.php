<?php

function lacz_bd() {
   $wynik = new mysqli('sbazy', 's176385', 'sCLZrCkB', 's176385');
   if (!$wynik) {
      throw new Exception('Po��czenie z serwerem bazy danych nie powiod�o si�');
   } else {
      return $wynik;
   }
}

?>
