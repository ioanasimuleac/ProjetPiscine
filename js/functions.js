function arrowFilter(){
  if (document.getElementById("arrow-filtre").className == "fa fa-caret-right active"){
    document.getElementById("arrow-filtre").style="transform: rotate(0deg); transition-duration: 0.3s;";
    document.getElementById("arrow-filtre").className = "fa fa-caret-right";
  }
  else {
    document.getElementById("arrow-filtre").style="transform: rotate(90deg); transition-duration: 0.3s;";
    document.getElementById("arrow-filtre").className = "fa fa-caret-right active";
  }
}

function renregistree(){
  var elements = document.getElementsByClassName('trueReserv');
  elementsLength = elements.length;
  if(document.getElementById("r-enregistree").checked == true){
    for (var i = 0 ; i < elementsLength ; i++) {
      elements[i].className = elements[i].className.substr(0, elements[i].className.length - 7);
    }
  }else{
    for (var i = 0 ; i < elementsLength ; i++) {
        elements[i].className += " d-none";
    }
  }
}

function rinexistante(){
  var elements = document.getElementsByClassName('falseReserv');
  elementsLength = elements.length;
  if(document.getElementById("r-inexistante").checked == true){
    for (var i = 0 ; i < elementsLength ; i++) {
      elements[i].className = elements[i].className.substr(0, elements[i].className.length - 7);
    }
  }else{
    for (var i = 0 ; i < elementsLength ; i++) {
        elements[i].className += " d-none";
    }
  }
}

function poui(){
  var elements = document.getElementsByClassName('truePaye');
  elementsLength = elements.length;
  if(document.getElementById("p-oui").checked == true){
    for (var i = 0 ; i < elementsLength ; i++) {
      elements[i].className = elements[i].className.substr(0, elements[i].className.length - 7);
    }
  }else{
    for (var i = 0 ; i < elementsLength ; i++) {
      elements[i].className += " d-none";
    }
  }
}

function pnon(){
  var elements = document.getElementsByClassName('falsePaye');
  elementsLength = elements.length;
  if(document.getElementById("p-non").checked == true){
    for (var i = 0 ; i < elementsLength ; i++) {
      elements[i].className = elements[i].className.substr(0, elements[i].className.length - 7);
    }
  }else{
    for (var i = 0 ; i < elementsLength ; i++) {
        elements[i].className += " d-none";
    }
  }
}

function prnon(){
  var elements = document.getElementsByClassName('falsePrevu');
  elementsLength = elements.length;
  if(document.getElementById("pr-non").checked == true){
    for (var i = 0 ; i < elementsLength ; i++) {
      elements[i].className = elements[i].className.substr(0, elements[i].className.length - 7);
    }
  }else{
    for (var i = 0 ; i < elementsLength ; i++) {
        elements[i].className += " d-none";
    }
  }
}

function proui(){
  var elements = document.getElementsByClassName('truePrevu');
  elementsLength = elements.length;
  if(document.getElementById("pr-oui").checked == true){
    for (var i = 0 ; i < elementsLength ; i++) {
      elements[i].className = elements[i].className.substr(0, elements[i].className.length - 7);
    }
  }else{
    for (var i = 0 ; i < elementsLength ; i++) {
        elements[i].className += " d-none";
    }
  }
}

function cnon(){
  var elements = document.getElementsByClassName('falseContact');
  elementsLength = elements.length;
  if(document.getElementById("c-non").checked == true){
    for (var i = 0 ; i < elementsLength ; i++) {
      elements[i].className = elements[i].className.substr(0, elements[i].className.length - 7);
    }
  }else{
    for (var i = 0 ; i < elementsLength ; i++) {
        elements[i].className += " d-none";
    }
  }
}

function coui(){
  var elements = document.getElementsByClassName('trueContact');
  elementsLength = elements.length;
  if(document.getElementById("c-oui").checked == true){
    for (var i = 0 ; i < elementsLength ; i++) {
      elements[i].className = elements[i].className.substr(0, elements[i].className.length - 7);
    }
  }else{
    for (var i = 0 ; i < elementsLength ; i++) {
        elements[i].className += " d-none";
    }
  }
}

function modifierSuivi(){
  document.getElementById('carac-suivi').className += " d-none";
  document.getElementById('btn-modif-suivi').className += " d-none";
  document.getElementById("update-suivi").className = document.getElementById("update-suivi").className.replace( /(?:^|\s)d-none(?!\S)/g , "" );
}

function annulerModifierSuivi(){
  document.getElementById("carac-suivi").className = document.getElementById("carac-suivi").className.replace( /(?:^|\s)d-none(?!\S)/g , "" );
  document.getElementById("btn-modif-suivi").className = document.getElementById("btn-modif-suivi").className.replace( /(?:^|\s)d-none(?!\S)/g , "" );
  document.getElementById('update-suivi').className += " d-none";
}

function modifierReservation(){
  document.getElementById('carac-reservation').className += " d-none";
  document.getElementById('btn-modif-reservation').className += " d-none";
  document.getElementById("update-reservation").className = document.getElementById("update-reservation").className.replace( /(?:^|\s)d-none(?!\S)/g , "" );
}
