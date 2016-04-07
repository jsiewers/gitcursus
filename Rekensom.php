<?php

class Rekensom {
  private $operator;
  private $getallen;


  public __constructor($operator, $getallen) {
    $this->operator = $operator;
    $this->getallen = $getallen;
  }

  public function getUitkomst() {
    $uitkomst = -1;
    if($this->operator == "optellen") {
      $uitkomst = $this->getallen[0] + $this->getallen[1];
    } else if ($this->operator == "aftrekken") {
      $uitkomst = $this->getallen[0] - $this->getallen[1];
    } else if ($this->operator == "vermenigvuldigen") {
      $uitkomst = $this->getallen[0] * $this->getallen[1];
    }
    return $uitkomst;
  }

}
