<?php

class Rekensom {
  public function getUitkomst($operator, $getallen, $antwoord) {
    $msg = "Oeps er is iets mis met de som gegaan";
    $uitkomst = "";
    if($operator == "optellen") {
      $uitkomst = $getallen[0] + $getallen[1];
      $msg = "Als je ".$getallen[0]." en ".$getallen[1]." bij elkaar optelt krijg je ".$uitkomst;
    } else if ($operator == "aftrekken") {
      $uitkomst = $getallen[0] - $getallen[1];
      $msg = "Als je ".$getallen[0]." en ".$getallen[1]." van elkaar aftrekt krijg je ".$uitkomst;
    } else if ($operator == "vermenigvuldigen") {
      $uitkomst = $getallen[0] * $getallen[1];
      $msg = "Als je ".$getallen[0]." en ".$getallen[1]." met elkaar vermenigvuldigt krijg je ".$uitkomst;
    }

    if($uitkomst == $antwoord) {
      $msg .= "<p>Jouw antwoord ".$antwoord.". Goed gedaan!!</p>";
    } else {
      $msg .= "<p>Jouw antwoord ".$antwoord." Helaas, niet goed</p>";
    }
    return $msg;
  }

}
