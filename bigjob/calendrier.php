<?php require("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header></header>
    <main>

    <script type="text/javascript">
//au départ par défault :
var tod = new Date(06/04/2023);
var compteurMois = 0;//0 = janvier
tod.setMonth(compteurMois);
addCalendar(tod);
 
//en cliquant sur les fleches
function changer(elem){
  if ( elem.id == "prec") {
    compteurMois--;
    if ( compteurMois < 0 ) compteurMois = 11;
  }
  else if ( elem.id == "suiv") {
    compteurMois++;
    if ( compteurMois > 11 ) compteurMois = 0;
  }
  var today = new Date();
  today.setMonth(compteurMois);//on simule une date avec le mois qu'on veut (de 0 = janvier, à 11 = décembre)
  addCalendar(today);
}
 
//la fonction qui réécrit le calendrier selon le mois
function addCalendar(today){
  var container = document.getElementById("cal");
  var day = today.getDay()
  var date = today.getDate();
  var month = today.getMonth();
  var year = today.getFullYear();
  today.setDate(1);
  var startDay = today.getDay();
  var monthLengths = [31,28,31,30,31,30,31,31,30,31,30,31];
  var dayLabels = ['L', 'M', 'M', 'J', 'V', 'S', 'D'];
  var monthNames = ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'];
  var dayNames = ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];
 
  var current = "";
  if ( startDay == 0 ) current = (-6);
  else current = 1-startDay;//on prend le numéro du jour et on recule jusqu'au 1er jour de la semaine
 
  var calendar = '<input type="button" id="prec" value="<<" onclick="changer(this);" />';
  calendar += '</label><label class="month">'+monthNames[month]+'</label>';
  calendar += '<label class="year"> '+year+'</label>';
  calendar += '<input type="button" id="suiv" value=">>" onclick="changer(this);" />';
  calendar += '<table><tr>';
  dayLabels.forEach(function(label){
    calendar += '<th>'+label+'</th>';
  })
  calendar += '</tr><tr>';
  //on a fini le haut du calendrier avec les boutons, on va commence en-dessous à rajouter les jours
  var dayClasses = '', curDay = "";
 
  var limitMonth = monthLengths[today.getMonth()];//savoir à quel numéro s'arrête le mois (28, 30, 31)
 
//Ici, on passe sur chaque journée du mois
  while( current < limitMonth){
    current++;
    if (current > 0){
      dayClasses = '';
      var d = new Date();
      today.setDate(current);//on simule qu'on est à +1 jour à chaque tour de while
      curDay = today.getDay();
      var vraiMois = d.getMonth();
      if ( vraiMois == today.getMonth()){//on met une 'class' css si on est sur le mois actuel
        if (current < date){
          dayClasses = ' disabled';
        }
        if (current == date){
          dayClasses = ' today';
        }
      }
      calendar += '<td class="'+dayClasses+'" data-day="'+dayNames[today.getDay()]+'">'+current+'</td>';
    } else {
      //on met des espaces blancs au debut du mois, tant que current arrive à 1
      calendar += '<td></td>';
    }
    if ( curDay == 0 && current > 0){ //après chaque dimanche, on passe à la ligne
      calendar += '</tr><tr>';
    }
  }
  calendar += '</tr></table>';
  container.innerHTML = calendar;
}
</script>
    </main>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>