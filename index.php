<?php
  include('Rekensom.php');
  $uitkomst = 0;
  if(isset($_POST['knop']) && isset($_POST['antwoord'])) {
      $rs = new Rekensom();
      $uitkomst = $rs->getUitkomst($_POST['operator'], $_POST['getallen'], $_POST['antwoord']);
  }
  ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Rekensommen</title>
</head>

<body>
  <?php echo $uitkomst;?>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    Eerste getal: <input type="number" name="getallen[]" value="<?php echo rand(0,10);?>">
        Operator: <select name="operator">
                      <option value="optellen">+</option>
                      <option value="aftrekken">-</option>
                      <option value="vermenigvuldigen">x</option>
                  </select>
    Tweede getal: <input type="number" name="getallen[]" value="<?php echo rand(0,10);?>"><br>
              <input type="number" name="antwoord"><br>
              <input type="submit" name="knop">
  </form>
</body>
</html>
