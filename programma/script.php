<div class="starter-template">
	<h1>Opdracht Login</h1>
    <p class="lead">Een login pagina</p>
<ol>
<li>Maak een pagina met een formulier en daarin invulvelden voor een email-adres, een wachtwoord en een submit-knop.</li>
<li>Als 1 van onderstaande email-adres/wachtwoord-combinaties wordt gegeven, dan wordt er een melding weergegeven: “Welkom”</li>
<li>Als de email-adres/wachtwoord-combinatie niet voorkomt, dan wordt er een melding weergegven met: “Sorry, geen toegang!”</li>
</ol>
<p>test@test.nl / test = administrator</p>
<p>klaas@carpets.nl / snoepje777 = gebruiker</p>


<?php

$users = array(
  "test@test.nl"  => "test",
  "piet@worldonline.nl"  => "doetje123",
  "klaas@carpets.nl"  => "snoepje777",
  "truushendriks@wegweg.nl"  => "arkiearkie201",
	"gnarfie@brabbel.com => "gnarfsel"
);

$rollen = array(
  "test@test.nl"  => "administrator",
  "piet@worldonline.nl"  => "administrator",
  "klaas@carpets.nl"  => "gebruiker",
  "truushendriks@wegweg.nl"  => "gebruiker"
);

$show_form = true;

if(isset($_GET['logout'])) {
  logout();
}

if(isset($_POST['login'])) {
    $show_form = false;
    if(checkLogin($users, $rollen, $_POST['login'], $_POST['pwd'])) {
      //je mag binnen
      $message = "Welkom op deze site!!";
    } else {
      //je mag niet binnen
      $message = "Wachtwoord en username zijn onbekend";
      $show_form = true;
    }
} else {
  if(isset($_SESSION['rol'])) {
      $show_form = false;
  }
}

//===== functions ======

function checkLogin($users, $rollen, $login, $pwd) {
  foreach($users as $uname => $upwd) {
      if($login == $uname && $pwd == $upwd) {
        $_SESSION['rol'] = $rollen[$uname];
        $_SESSION['uname'] = $uname;
        return true;
      }
  }
  return false;
}

function logout() {
    $_SESSION = array();
    session_destroy();
}

echo "<p>".$message."</p>";
if(isset($_SESSION['rol'])) {
  echo "<p>".$_SESSION['uname']." ".$_SESSION['rol']."</p>";
}

if (!$show_form) {
  echo "<p>Ga naar <a href='".$_SERVER[PHP_SELF]."?p=13-php-getout'>deze zwaar beveiligde pagina</a>...</p>";
  echo "<p><a href='".$_SERVER[PHP_SELF]."?p=12-php-admin&logout'>Uitloggen</a></p>";
} else {
?>

<form role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>?p=12-php-admin" method="post">
  <div class="form-group">
    <label for="login">Login:</label>
    <input type="text" class="form-control" id="login" name="login" value="<?php echo $login;?>"
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pwd" value="<?php echo $wachtwoord;?>">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
<?php } ?>
