function GetValue(id, def_value)
{
  var elem = document.getElementById(id);
  var ertek = elem.value;  
  if(ertek == "")
    ertek = def_value;
  return ertek;
}
