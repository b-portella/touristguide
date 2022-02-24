<?php
class MyUser
{
  // osztály saját adatai (nem publikus)  
  private $id;
  private $login;
  private $email;
  private $jogosultsag;
  private $config;
  // konstruktor, a session alapján állítja be az adatokat
  public function __construct()
  {
    global $config_session;
    $this->config = $config_session;

    $kulcs = $config_session['key'];
    $ertek = $config_session['value'];
    if(isset($_SESSION[$kulcs]) && $_SESSION[$kulcs] === $ertek)
    {
      $this->id = $_SESSION['user']['id'];
      $this->login = $_SESSION['user']['login'];
      $this->email = $_SESSION['user']['email'];
      $this->jogosultsag = $_SESSION['user']['jogosultsag'];
    }
    else
    {
      $this->id = 0;
      $this->login = "";
      $this->email = "";
      $this->jogosultsag = "latogato";
    }
  }

  // id, login, email, jogosultsag és config_session alapján beállítja a szükéges munkamenet változókat --> beléptetés
  public function Login($id, $login, $email="", $jogosultsag="felhasznalo")
  {
    $kulcs = $this->config['key'];
    $ertek = $this->config['value'];
    $_SESSION[$kulcs] = $ertek;
    $_SESSION['user'] = array('id' => $id, 'login' => $login, 'email' => $email, 'jogosultsag' => $jogosultsag);
    header("location: index.php");
  }

  // config_session alapján megszünteti a szükéges munkamenet változókat --> kiléptetés
  public function Logout()
  {
    $kulcs = $this->config['key'];
    unset($_SESSION[$kulcs]);
    unset($_SESSION['user']);
    header("location: index.php");
  }

  // a felhasználó bejelentkezett_e, logikai függvény, true-bejelentkezett, false-nincs bejelentkezve
  public function IsLogin()
  {
    $kulcs = $this->config['key'];
    $ertek = $this->config['value'];
    return isset($_SESSION[$kulcs]) && $_SESSION[$kulcs] === $ertek && 
           $_SESSION['user']['id'] === $this->id && 
           $_SESSION['user']['login'] === $this->login;
  }

  // a felhasználó adminisztrátor-e, logikai függvény, true-bejelentkezett és admin jogosultság, false-nincs bejelentkezve vagy nem is admin
  public function IsAdmin()
  {
    return $this->IsLogin() && $this->jogosultsag === 'admin';
  }

  // a felhasználó id adat lekérdezése
  public function GetId()
  {
    return $this->id;
  }

  // a felhasználó login adat lekérdezése
  public function GetLogin()
  {
    return $this->login;
  }

  // a felhasználó email adat lekérdezése
  public function GetEmail()
  {
    return $this->email;
  }

  // a felhasználó jogosultsag adat lekérdezése
  public function GetJogosultsag()
  {
    return $this->jogosultsag;
  }
}
?>
