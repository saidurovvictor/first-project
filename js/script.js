

/*
function RegisterFormFunction() {
  var x = document.getElementById("regBox");
  var y = document.getElementById("loginBox");
  if (y.className === "loginBox" && x.className === "regBox active") {
    y.className = "loginBox";
  }else if (y.className === "loginBox"){
    y.className += " active";
  } else {
    y.className = "loginBox";
  }

  if (x.className==="regBox active") {
    x.className = "regBox";
  }
} 
*/


function regFunction() {
  var x = document.getElementById("regBox");
  var y = document.getElementById("loginBox");
  if (y.className === "loginBox active") {
    y.className = "loginBox";
  }
  if (x.className === "regBox"){
    x.className += " active";
  } else {
    x.className = "regBox";
  }
} 


function exitFunction(){
  var x = document.getElementById("hidden_profile");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}


function openTab(evt, tabname) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(tabname).style.display = "block";
  evt.currentTarget.className += " active";


}




function filterShowButton(){
  var x = document.getElementById("filterBox");
  if (x.style.display === "none") {
    x.style.display = "flex";
  } else {
    x.style.display = "none";
  }
}



