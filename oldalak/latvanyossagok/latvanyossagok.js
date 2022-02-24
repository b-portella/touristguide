function CreateURL()
{
  var url = "";
  var sv = "";
  
  // oldal
  url = url + document.frm01.oldal.value;

  // muvelet
  url = url + '/' + document.frm01.muvelet.value;

  // lap
  sv = document.frm01.lap.value;
  if(sv == '') sv='1';
  url = url + '/' + sv;
  
  // megye_id
  sv = document.frm01.megye_id.value;
  if(sv == '') sv='0';
  url = url + '/' + sv;

  // telepules_id
  sv = document.frm01.telepules_id.value;
  if(sv == '') sv='0';
  url = url + '/' + sv;

  // keres
  sv = document.frm01.keres.value;
  if(sv != '')
    url = url + '/' + sv;
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