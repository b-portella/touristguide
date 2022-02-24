<?php
class MyRouter
{
  // osztály saját adatai (nem publikus)
  private $oldal;
  private $muvelet;
  private $lap;
  private $parameterek;
  private $mappa;
  private $str_vezerlo;
  private $str_tartalom;

  // konstruktor, meghívja az Init metódust
  public function __construct($mappa='oldalak', $str_vezerlo='vererlo', $str_tartalom='tartalom')
  {
    $this->mappa = $mappa;
    $this->str_vezerlo = $str_vezerlo;
    $this->str_tartalom = $str_tartalom;
    $this->Init();
  } 

  // GET/POST tömbből kiszedi és beállítja a page, event és a többi paramétereket
  private function get_adatok($tomb)
  {
    $oldal = "";
    $muvelet = "";
    $lap = "1";
    // oldal
    if(isset($tomb['oldal']))
    {
      $oldal = $tomb['oldal'];
    }
    else
    {
      $oldal = '404'; // hiba oldal lesz
    }
    // muvelet
    if(isset($tomb['muvelet']))
    {
      $muvelet = $tomb['muvelet'];
    }
    // lap
    if(isset($tomb['lap']))
    {
      $lap = $tomb['lap'];
      if($lap=="") $lap="1";
    }

    $this->oldal = $oldal;
    $this->muvelet = $muvelet;
    $this->lap = $lap;
    $this->parameterek = $tomb;
  }


  // GET/POST alapján inicializálja az oldal-t (page paraméter), a muvelet-et (event paraméter), a többi a parameterek asszociatív tömbbe kerül
  public function Init()
  {
    if(count($_GET) > 0) // feldolgozás get adatok alapján
    {
      $this->get_adatok($_GET);
    }
    else if(count($_POST) > 0) // feldolgozás post adatok alapján
    {
      $this->get_adatok($_POST);
    }
    else // se get, se post --> főoldal lesz
    {
      $this->oldal = 'fooldal';
      $this->muvelet = '';
      $this->lap = '1';
      $this->parameterek = [];
    }
  } 
  
  // az oldal adat lekérdezése
  public function GetOldal()
  {
    return $this->oldal;
  }

  // a muvelet adat lekérdezése
  public function GetMuvelet()
  {
    return $this->muvelet;
  }

  // a lap adat lekérdezése
  public function GetLap()
  {
    return $this->lap;
  }

  // a parameterek adat lekérdezése
  public function GetParameterek()
  {
    return $this->parameterek;
  }

  // a vezerlo.php fájl elérési útja
  public function GetFNevVezerlo()
  {
    return $this->mappa."/".$this->oldal."/".$this->oldal."_".$this->str_vezerlo.".php";
  }

  // a tartalom.php fájl elérési útja
  public function GetFNevTartalom()
  {
    return $this->mappa."/".$this->oldal."/".$this->oldal."_".$this->str_tartalom.".php";
  }

  // a javascript fájl csatolásának html kódja
  public function LinkJavaScript()
  {
    $fnev = $this->mappa."/".$this->oldal."/".$this->oldal.".js";
    if(file_exists($fnev))
      return '<script src="'.$fnev.'"></script>';
    else
      return "";
  }

  // adott ujoldal tartalmának betöltése
  public function Go($ujoldal)
  {
    header("location:index.php?oldal=$ujoldal");
    return;
  } 
}
?>