<?php
class MyAdatbazis 
{
  // osztály saját adatai (publikus)
  public $db;
  // osztály publikus adatai
  public $str_error; // utolsó művelethez tartozó hiba szövege.

  // kapcsolódás a mysql szervezhez
  public function Connect()
  {
    global $config_sql;
    try
    {
      $this->db = new mysqli($config_sql['host'], $config_sql['user'], $config_sql['pwd'], $config_sql['data']);

      if ($this->db->connect_error) 
      {
        $this->str_error = 'Nem sikerült csatlakozni az sql szerverhez: '.$this->db->connect_error;
        echo $this->str_error;
        die;
      }

      $this->db->query("set names utf8");
      $this->db->query("set character set utf8");
    }
    catch (Exception $err) 
    {
      $this->str_error = 'Adatbázis hiba: '.$err->message;
      echo $this->str_error;
      die;
    } 
  }

  // kapcsolódás lezárása
  public function Close()
  {
    $this->db->close();
  }

  // sql parancs végrehajtása, visszatérési érték select jellegű esetén a lekérdezés sorainak asszociatív tömbje, nem select jellegű esetén true (siker) vagy false (sikertelen)
  // paraméter: sql - maga az sql parancs
  public function Query($sql)
  {
    try
    {
      $this->str_error = '';
      $ok = $this->db->query($sql);
      if($ok === true)
      {
        return $ok;
      }
      else if($ok === false)
      {
        $this->str_error = $this->db->error;
        return $ok;
      } 
      else
      {
        $sorok = $ok;
        $tomb = [];
        while($sor = $sorok->fetch_assoc())
        {
          $tomb[] = $sor;
        }
        return $tomb;
      }
    }
    catch (Exception $err) 
    {
      $this->str_error = 'Adatbázis hiba: '.$err->message;
      echo $this->str_error;
    } 
  }

  // select jellegű sql parancs végrehajtása, visszatérési érték a lekérdezés sorainak asszociatív tömbje
  // paraméter: sql - a lekérdezés sql parancsa
  public function Select($sql)
  {
    try
    {
      $this->str_error = '';
      $sorok = $this->db->query($sql);
      if($sorok === false)
      {
        $this->str_error = $this->db->error;
        return false;
      }
      else
      {
        $tomb = [];
        while($sor = $sorok->fetch_assoc())
        {
          $tomb[] = $sor;
        }
        return $tomb;
      }
    }
    catch (Exception $err) 
    {
      $this->str_error = 'Adatbázis hiba: '.$err->message;
      echo $this->str_error;
    } 
  }

  // insert into jellegű sql parancs végrehajtása, visszatérési érték: siker esetén az új rekord id-je, false ha nem sikerült az új rekord beszúrása
  // paraméter: sql - a beszúrás sql parancsa
  public function Insert($sql)
  {
    try
    {
      $this->str_error = '';
      $ok = $this->db->query($sql);
      if($ok === true)
      {
        return $this->db->insert_id;
      }
      else
      {
        $this->str_error = $this->db->error;
        return false;
      }
    }
    catch (Exception $err) 
    {
      $this->str_error = 'Adatbázis hiba: '.$err->message;
      echo $this->str_error;
    } 
  }

  // update jellegű sql parancs végrehajtása, visszatérési érték: siker esetén true, sikertelen módosítás esetén false
  // paraméter: sql - a módosítás sql parancsa
  public function Update($sql)
  {
    try
    {
      $this->str_error = '';
      $ok = $this->db->query($sql);
      if($ok === true)
      {
        return true;
      }
      else
      {
        $this->str_error = $this->db->error;
        return false;
      }
    }
    catch (Exception $err) 
    {
      $this->str_error = 'Adatbázis hiba: '.$err->message;
      echo $this->str_error;
    } 
  }

  // delete jellegű sql parancs végrehajtása, visszatérési érték: siker esetén true, sikertelen módosítás esetén false
  // paraméter: sql - a törlés sql parancsa
  public function Delete($sql)
  {
    try
    {
      $this->str_error = '';
      $ok = $this->db->query($sql);
      if($ok === true)
      {
        return true;
      }
      else
      {
        $this->str_error = $this->db->error;
        return false;
      }
    }
    catch (Exception $err) 
    {
      $this->str_error = 'Adatbázis hiba: '.$err->message;
      echo $this->str_error;
    } 
  }

  // keresés, segéd függvény, siker esetén a találati id, nincs találat esetén -1
  // paraméterek: sql - maga a keresési sql parancs
  //              field - a visszaadott kulcs mező neve nem lenne id 
  private function Search($sql,$field)
  {
    $sorok = $this->Select($sql);
    if(count($sorok) == 1)
    {
      return $sorok[0][$field];
    } 
    else
    {
      return -1;
    } 
  }

  // keresés, siker esetén az első találati id, nincs találat esetén -1
  // paraméterek: table - tábla neve
  //              field - melyik a keresési mező
  //              value - a keresett érték
  //              field_id - ha visszaadott kulcs mező neve nem lenne id 
  public function IndexOf($table, $field, $value, $field_id="id")
  {
    $sql = "select $field_id from $table where $field = '$value' order by 1 asc limit 1 ";
    return $this->Search($sql,$field_id);
  }     

  // keresés, siker esetén az utolsó találati id, nincs találat esetén -1
  // paraméterek: table - tábla neve
  //              field - melyik a keresési mező
  //              value - a keresett érték
  //              field_id - ha visszaadott kulcs mező neve nem lenne id 
  public function LastIndexOf($table, $field, $value, $field_id="id")
  {
    $sql = "select $field_id from $table where $field = '$value' order by 1 desc limit 1 ";
    return $this->Search($sql,$field_id);
  }  
  
  // menüpontok két dimenziós asszociatív tömbjének feltöltése a menu_pontok tábla alapján
  public function GetMenus()
  {
    $fomenuk = $this->Select("select id, page, megn, lathato 
                              from menu_pontok 
                              where szulo_id=0 
                              order by sorrend,id");
    $menupontok = [];
    foreach($fomenuk as $elem)
    {
      $szulo_id = $elem['id'];
      $almenu = $this->Select("select id, page, megn, lathato 
                               from menu_pontok 
                               where szulo_id='$szulo_id' 
                               order by sorrend,id");
      if(count($almenu)==0)
      {
        $al = false;
      }
      else
      {
        $al = $almenu;
      }
      $menupontok[] = array('fo' => $elem, 'al' => $al); 
    }
    return $menupontok;
  }

  // lathato (mindig, be_elott, be_utan, be_utan_felh, be_utan_admin) ellenőrzése bejelentkezés, jogosultság figyelésével
  // paraméterek: lathato (mindig, be_elott, be_utan, be_utan_felh, be_utan_admin)
  //              is_login - be van-e jelentkezve? true/false
  //              is_admin - admin jogosultsága van-e? true/false
  // visszatérési érték: ""-ha rendben, "oldal"-ha nincs rendben (ezt az oldalt kell betölteni)
  private function GetNewPage($lathato, $is_login, $is_admin)
  {
    // bejelentkezes előtt látható, de már be van jelentkezve
    if($lathato == 'be_elott' && $is_login == true)
      return 'fooldal';
    // bejelentkezés után látható, de nincs bejelentkezve
    if(substr($lathato,0,7) == 'be_utan' && $is_login == false) 
      return 'bejelentkezes';
    // bejelentkezés után látható, de csak felhasználói jogosultsággal (nem adminként)   
    if($lathato == 'be_utan_felh' && $is_login == true && $is_admin == true)
      return 'bejelentkezes';
    // bejelentkezés után látható, de csak admin jogosultsággal (nem felhasználóként)   
    if($lathato == 'be_utan_admin' && $is_login == true && $is_admin == false)
      return 'bejelentkezes';
    // rendben
    return "";
  }

  // adott tartalom (oldal) betölthető-e? bejelentkezés, jogosultság figyelése
  // paraméterek: oldal - betöltendő oldal neve
  //              is_login - be van-e jelentkezve? true/false
  //              is_admin - admin jogosultsága van-e? true/false
  // visszatérési érték: ""-ha rendben, "oldal"-ha nincs rendben (ezt az oldalt kell betölteni)
  public function IsPageAllRight($oldal, $is_login, $is_admin)
  {
    $menu = $this->Select("select * from menu_pontok where page='$oldal' limit 1");
    if($menu === false || count($menu) == 0) // nincs ilyen page elnevezéssel a menu_pontok táblában --> nem található a keresett oldal 404.php töltődik be
    {
      return "";
    }
    else
    {
      $szulo_id = $menu[0]['szulo_id']; 
      // FŐMENÜ-re ellenőrzés
      if($szulo_id > 0) // van ilyen page a menu_pontok táblában, de az almenü, a főmenü jogosultságának figyelése
      {
        $fomenu = $this->Select("select * from menu_pontok where id='$szulo_id' limit 1");
        if($fomenu === false || count($fomenu) == 0) // nincs ilyen page elnevezéssel főmenü a menu_pontok táblában --> nem található a keresett oldal 404.php töltődik be
        {
          return "";
        }
        else
        {
          $lathato = $fomenu[0]['lathato'];
          $oldal = $this->GetNewPage($lathato, $is_login, $is_admin);
          if($oldal != "")
            return $oldal;
        }
      }
      
      // MENÜ-re ellenőrzés 
      $lathato = $menu[0]['lathato'];
      $oldal = $this->GetNewPage($lathato, $is_login, $is_admin);
      return $oldal;
    }
  }

  // legördülő lista (select tag) option elemeit feltölti és szövegként visszaadja, sql parancs alapján
  // paraméterek: $sql - az options elemek feltöltésének sql parancs alapja
  //              $value - az a mező, amelyik az option value részébe kerüljön
  //              $text - az a mező, amelyik az option elemben szövegként látszódik
  //              $default - a value mező azon konkrét értéke, amely alapján az lesz a selected elem
  //              $item_empty - ha false, akkor nincs külön első option elem, 
  //                            ha nem false, akkor az a szöveg lesz az első elem (value része "")    
  public function StrOptionsSql($sql, $value, $text, $default="", $item_empty=false)
  {
    $sorok = $this->Select($sql);
    $sv = "";
    if($item_empty !== false)
    {
      $sv .= '<option value="">'.$item_empty.'</option>';
    }
    foreach($sorok as $elem)
    {
      if($elem[$value] == $default) $s=' selected'; else $s='';
      $sv .= '<option value="'.$elem[$value].'"'.$s.'>'.$elem[$text].'</option>';
    }
    return $sv;
  }

  // legördülő lista (select tag) option elemeit feltölti és szövegként visszaadja, tábla+mezők neve alapján 
  // paraméterek: $table - az options elemek feltöltéséhez tábla neve
  //              $value - az a mező, amelyik az option value részébe kerüljön
  //              $text - az a mező, amelyik az option elemben szövegként látszódik
  //              $default - a value mező azon konkrét értéke, amely alapján az lesz a selected elem
  //              $item_empty - ha false, akkor nincs külön első option elem, 
  //                            ha nem false, akkor az a szöveg lesz az első elem (value része "")    
  public function StrOptionsTable($table, $value, $text, $default="", $item_empty=false)
  {
    $sql = "select $value, $text from $table order by $text";
    return $this->StrOptionsSql($sql, $value, $text, $default, $item_empty);
  }

}    
?>