<?php
  include('Rekensom.php');
$uitkomst = 0;
if(isset($_POST['knop'])) {
    $rs = new Rekensom($_POST['operator'], $_POST['getal']);
    $uitkomst = $rs->
}




  ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Rekensommen</title>
</head>

<body>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    Eerste getal: <input type="number" name="getal[]"><br>
    Tweede getal: <input type="number" name="getal[]"><br>
    Operator: <select name="operator">
                  <option value="optellen">+</option>
                  <option value="aftrekken">-</option>
                  <option value="vermenigvuldigen">-</option>
              </select><br>
              <input type="submit" name="knop">
  </form>
</body>
</html>
