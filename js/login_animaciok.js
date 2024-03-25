function reg_gomb(){
    document.getElementById('bejelentkezes').style.animationName = 'eltunik';
    document.getElementById('bejelentkezes').style.animationDuration = '0.2s';
    document.getElementById('bejelentkezes').style.animationDelay = '0s';
    document.getElementById('bejelentkezes').style.animationFillMode = 'both';
    document.getElementById('regisztracio').style.animationName = 'megjelen';
    document.getElementById('regisztracio').style.animationDelay = '0.3s';
    document.getElementById('regisztracio').style.animationDuration = '0.2s';
    document.getElementById('regisztracio').style.animationFillMode = 'both';
}
function be_gomb(){
    document.getElementById('regisztracio').style.animationName = 'eltunik';
    document.getElementById('regisztracio').style.animationDuration = '0.2s';
    document.getElementById('regisztracio').style.animationDelay = '0s';
    document.getElementById('regisztracio').style.animationFillMode = 'both';
    document.getElementById('bejelentkezes').style.animationName = 'megjelen';
    document.getElementById('bejelentkezes').style.animationDelay = '0.3s';
    document.getElementById('bejelentkezes').style.animationDuration = '0.2s;'
    document.getElementById('bejelentkezes').style.animationFillMode = 'both';
}
function elfelejtett(){
    document.getElementById('bejelentkezes').style.animationName = 'eltunik';
    document.getElementById('bejelentkezes').style.animationDuration = '0.2s';
    document.getElementById('bejelentkezes').style.animationDelay = '0s';
    document.getElementById('bejelentkezes').style.animationFillMode = 'both';
    document.getElementById('elfelejtett').style.animationName = 'megjelen';
    document.getElementById('elfelejtett').style.animationDelay = '0.3s';
    document.getElementById('elfelejtett').style.animationDuration = '0.2s';
    document.getElementById('elfelejtett').style.animationFillMode = 'both';
}
function elfelejtett_vissza(){
    document.getElementById('elfelejtett').style.animationName = 'eltunik';
    document.getElementById('elfelejtett').style.animationDuration = '0.2s';
    document.getElementById('elfelejtett').style.animationDelay = '0s';
    document.getElementById('elfelejtett').style.animationFillMode = 'both';
    document.getElementById('bejelentkezes').style.animationName = 'megjelen';
    document.getElementById('bejelentkezes').style.animationDelay = '0.3s';
    document.getElementById('bejelentkezes').style.animationDuration = '0.2s;'
    document.getElementById('bejelentkezes').style.animationFillMode = 'both';
}

// ELLENŐRZI HOGY A MEGADOTT EMAIL HELYES-E
		
function emailhiba_on(){
    document.getElementById("email").style.backgroundColor = "#a10202";
    
}
function emailhiba_off(){
    document.getElementById('email').style.background = 'transparent';
}

function validateEmail(val) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(val);
}
function validate() {
var email = document.getElementById("email");
if (validateEmail(email.value)) {
        emailhiba_off()
  } else {
        emailhiba_on()
  }
}