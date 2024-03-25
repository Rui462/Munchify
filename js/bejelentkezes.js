//segédfüggvény:
function $(id){
    return document.getElementById(id);
}

//Kosár kinullázása:
const kosarlista = [];
localStorage.setItem("kosar",JSON.stringify(kosarlista));

// Enterrel is be lehet jelentkezni

var be_fnev = $("bejelentkezes_fnev");
var be_jelszo = $("bejelentkezes_jelszo");
be_fnev.onkeyup = function(e){
    if(e.keyCode == 13){
       belepes();
    }
}
be_jelszo.onkeyup = function(e){
    if(e.keyCode == 13){
       belepes();
    }
}

//Jelszó ellenőrző panel
$('jelszo1').addEventListener('focus', function(){
    $('ertesites_container').innerHTML = `<div id='jelszoertesito' class="hiba"><b>A jelszónak tartalmaznia kell:</b><br>
    <span style='color: #3b0000' id='karakterszoveg'>ⓧ Legalább 8 karaktert!</span><br>
    <span style='color: #3b0000' id='nagybetuszoveg'>ⓧ Legalább 1 nagybetűt!</span><br>
    <span style='color: #3b0000' id='szamszoveg'>ⓧ Legalább 1 számjegyet!</span><br>
    </div>`;
    $('jelszoertesito').style.animationName = `megjelen`;
    $('jelszoertesito').style.animationDuration = `0.3s`;
    $('jelszoertesito').style.animationFillMode = `both`;

});
$('jelszo1').addEventListener('blur', function(){
    $('jelszoertesito').style.animationName = `eltunik`;
    $('jelszoertesito').style.animationDuration = `0.3s`;
    $('jelszoertesito').style.animationFillMode = `both`;
});

function jelszoellenorzes(){
    JelszoEll = 0;
    let jelszoc = $('jelszo1').value;
    if(jelszoc==jelszoc.toLowerCase()){
        $('nagybetuszoveg').innerText = "ⓧ Legalább 1 nagybetűt!";
        $('nagybetuszoveg').style.color = "#3b0000";
        JelszoEll-=1;
    }
    else{
        $('nagybetuszoveg').innerText = "✓ Legalább 1 nagybetűt!";
        $('nagybetuszoveg').style.color = "#106900";
        JelszoEll+=1;
    }

    var regex = /\d/g;
    if(regex.test(jelszoc)){
        $('szamszoveg').innerText = "✓ Legalább 1 számjegyet!";
        $('szamszoveg').style.color = "#106900";
        JelszoEll+=1;
    }
    else{
        $('szamszoveg').innerText = "ⓧ Legalább 1 számjegyet!";
        $('szamszoveg').style.color = "#3b0000";
        JelszoEll-=1;
    }

    if(jelszoc.length<8){
        $('karakterszoveg').innerText = "ⓧ Legalább 8 karaktert!";
        $('karakterszoveg').style.color = "#3b0000"; 
        JelszoEll-=1;
    }
    else{
        $('karakterszoveg').innerText = "✓ Legalább 8 karaktert!";
        $('karakterszoveg').style.color = "#106900";
        JelszoEll+=1;
    }
    if(JelszoEll==3){
        $('jelszoertesito').style.backgroundColor = "#aeff9e";
        $('jelszoertesito').style.color = "#106900";
        $('jelszoertesito').style.border = "1px solid #106900";
    }
    else{
        $('jelszoertesito').style.backgroundColor = "#ffabab";
        $('jelszoertesito').style.color = "#3b0000";
        $('jelszoertesito').style.border = "1px solid #3b0000";
    }
};

//aszinkron kérésekhez általános függvény:
async function aszinkronKeres(adat){
    try {
        let keres = await fetch('./php/index.php/bejelentkezes', {
            method : 'POST',
            body : JSON.stringify(adat)
        });
        let eredmeny = await keres.json();

        //ha sikeres a belépés, átirányítjuk a kezdőoldalra:
        if (eredmeny.uzenet == "Sikeres belépés!"){
            if(eredmeny.jog == 0){
                window.location.href = "home"; //?
                localStorage.setItem("userid",eredmeny.id);
            }
            else if (eredmeny.jog == 1){
                window.location.href = "panel";
            }
        }
        if (eredmeny.uzenet == "Belépés sikertelen!"){
            $('ertesites_container').innerHTML = `<div class="hiba"><b>Sikertelen belépés!</b><br>Hibás felhasználónév/jelszó!</div>`;
        }
        

    } catch (error) {
        console.log(error);
    }
}

//belépés:
function belepes(){
    let felhasznalonev = $('bejelentkezes_fnev');
    let jelszo = $('bejelentkezes_jelszo');


    if (felhasznalonev.value == '' || jelszo.value == ''){
        $('ertesites_container').innerHTML = `<div class="hiba"><b>Hiba!</b><br>Nem adott meg adatokat!</div>`;
        return;
    }
    else {
        let kuldendo = {
            'fnev' : felhasznalonev.value,
            'jelszo' : jelszo.value
        };
        aszinkronKeres(kuldendo);     
    }
}

//aszinkron kérés regisztráció függvény
async function aszinkronKeresReg(adat){
    try {
        let keres = await fetch('./php/index.php/regisztracio', {
            method : 'POST',
            body : JSON.stringify(adat)
        });
        let eredmeny = await keres.json();
        if(eredmeny.uzenet == "Sikeres művelet!"){
            $('ertesites_container').innerHTML = "<div class='hiba' style='background-color:#aeff9e; color: #062100; border: 1px solid #195e0b;'><b>Sikeres regisztráció!</b><br>A fiókodat az email címedre kiküldött linken keresztül tudod megerősíteni!</div>";
        }
        else{
            $('ertesites_container').innerHTML = `<div class="hiba"><b>Hiba!</b><br>${eredmeny.uzenet}</div>`; 
        }
    } catch (error) {
        console.log(error);
    }
}

//regisztráció:
function regisztracio(){
    $('regValasz').innerHTML="";
    let knev = $('knev').value;
    let vnev = $('vnev').value;
    let email = $('email').value;
    let felhasznalonev = $('fnev').value;
    let jelszo1 = $('jelszo1');
    let jelszo2 = $('jelszo2');

    if (vnev == '' || knev == '' || email == '' || felhasznalonev == '' || jelszo1.value == '' || jelszo2.value == ''){
        $('ertesites_container').innerHTML = "<div class='hiba'><b>Hiba!</b><br>Nincs kitöltve minden mező!</div>";
        return;
    }
    else if(JelszoEll != 3){
        $('ertesites_container').innerHTML = "<div class='hiba'><b>Hiba!</b><br>A jelszó nem felel meg a feltételeknek!</div>";
        return;
    }
    else if (jelszo1.value != jelszo2.value){
        $('ertesites_container').innerHTML = "<div class='hiba'><b>Hiba!</b><br>A két jelszó nem egyezik meg!</div>";
        return;
    }
    else {
        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
        let kuldendo = {
            'vezeteknev': capitalizeFirstLetter(vnev),
            'keresztnev': capitalizeFirstLetter(knev),
            'email' : email,
            'fnev' : felhasznalonev,
            'jelszo' : jelszo1.value
        };
        $('knev').value="";
        $('vnev').value="";
        $('email').value="";
        $('fnev').value="";
        $('jelszo1').value="";
        $('jelszo2').value="";
        return aszinkronKeresReg(kuldendo);
    }


}

    //aszinkron kérés elfelejtett jelszó függvény
    async function aszinkronKeresEl(adat){
        try {
            let keres = await fetch('./php/index.php/elfelejtett_jelszo', {
                method : 'POST',
                body : JSON.stringify(adat)
            });

            let eredmeny = await keres.json();
            $('ertesites_container').innerHTML = "<div class='hiba' style='background-color:#aeff9e; color: #062100; border: 1px solid #195e0b;'><b>Sikeres jelszó igénylés!</b><br>Ha létezik ezzel az email címmel fiók, akkor kiküldtük a megerősítéshez szükséges emailt!</div>";
        } catch (error) {
            console.log(error);
        }
    }


    //elfelejtett jelszó:
function elfelejtett(){
    let elfelejtett_e = $('elfelejtett_email').value;
    if (elfelejtett_e == ''){
        $('ertesites_container').innerHTML = "<div class='hiba'><b>Hiba!</b><br>Nincs email megadva!</div>";
        return;
    }
    else {
        let kuldendo = {
            'email' : elfelejtett_e,
        };
        aszinkronKeresEl(kuldendo);
    }


}
$('bejelentkezes_gomb').addEventListener('click',belepes);
$('regGomb').addEventListener("click", regisztracio);
$('elfelejtett_gomb').addEventListener("click", elfelejtett);