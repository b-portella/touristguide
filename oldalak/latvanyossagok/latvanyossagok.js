function CreateURL()
{
  var url = "index.php?";
  var sv = "";
  
  // oldal
  url = url + "oldal=" + document.frm01.oldal.value;

  // muvelet
  url = url + '&muvelet=' + document.frm01.muvelet.value;

  // lap
  sv = document.frm01.lap.value;
  if(sv == '') sv='1';
  url = url + '&lap=' + sv;
  
  // megye_id
  sv = document.frm01.megye_id.value;
  if(sv == '') sv='0';
  url = url + '&megye_id=' + sv;

  // telepules_id
  sv = document.frm01.telepules_id.value;
  if(sv == '') sv='0';
  url = url + '&telepules_id=' + sv;

  // keres
  sv = document.frm01.keres.value;
  if(sv != '')
    url = url + '&keres=' + sv;
console.log(url);
  return url;
}

function LoadHref()
{
  var url = CreateURL();
  location.href = url;
}

function MegyeChange()
{
  document.frm01.telepules_id.value="";
  LoadHref();
}