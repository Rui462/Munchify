//segédfüggvény:
function $(id){
    return document.getElementById(id);
}

//aszinkron kérésekhez általános függvény:
async function aszinkronKeres(adat, htmlelem){
    try {
        let keres = await fetch('./php/index.php/jelszo_v', {
            method : 'POST',
            body : JSON.stringify(adat)
        });
        let eredmeny = await keres.json();
        if(eredmeny.uzenet == "kesz"){
            $('jelszovaltoztatas').innerHTML = "<center><span style='text-align: center;font-family: Open Sans; font-size: 100%;'><b>Sikeres jelszó változtatás!</b><br>Visszairányítunk a bejelentkezéshez!</span>"
            window.setTimeout(function(){
                window.location.href = "./index";
            }, 5000);
        }
        else if(eredmeny.uzenet == "nincs"){
            window.location.href = "./index";
        }

    } catch (error) {
        console.log(error);
    }
}


//regisztráció:
function jelszo_valtoztatas(){
    let jelszo1 = $('jelszo1').value;
    let jelszo2 = $('jelszo2').value;


    if (jelszo1=='' || jelszo2==''){
        $('ertesites_container').innerHTML = "<div class='hiba'><b>Hiba!</b><hr>Nincs minden mező kitöltve.</div>";
    }
    else if(jelszo1!=jelszo2){
        $('ertesites_container').innerHTML = "<div class='hiba'><b>Hiba!</b><hr>A két jelszó nem egyezik meg!</div>";
    } 
    else{
        let jid = $('jid').value;
        let jelszo = jelszo1;
        let kuldendo = {
            'id' : jid,
            'jelszo' : jelszo
        };
        aszinkronKeres(kuldendo);
    }
}

//aszinkron kérésekhez (id) általános függvény:
async function aszinkronKeresId(adat){
    try {
        let keres = await fetch('./php/index.php/jelszo_v_idcheck', {
            method : 'POST',
            body : JSON.stringify(adat)
        });
        let eredmeny = await keres.json();
        if(eredmeny['uzenet'] == "nincs"){
            $('jelszovaltoztatas').innerHTML = "<center><span style='text-align: center;font-family: Open Sans; font-size: 100%;'><b>A megadott azonosító nem érvényes.<br>(Lejárt / Nem létezik)</b></span>"
        }
        else if (eredmeny['uzenet'] == "jo"){
            $('jelszovaltoztatas').innerHTML = "<center><span style='text-align: center;font-family: Open Sans; font-size: 100%;'><b>Jelszó változtatás</b></span></center><br><form method='POST'><input type='password' placeholder='Jelszó' id='jelszo1' onkeyup='jelszoellenorzes()' autocomplete='off' name='bejelentkezes_pw' /><div style='padding-top: 5%;'></div><input type='password' placeholder='Jelszó mégegyszer' id='jelszo2' autocomplete='off' name='bejelentkezes_pw' /><div style='padding-top: 5%;'></div><input class='oke_gomb' type='button' id='jelszo_gomb' value='Jelszó megváltoztatása' /></form>"
            $('jelszo_gomb').addEventListener('click',jelszo_valtoztatas);
        }

    } catch (error) {
        console.log(error);
    }
}

//id ellenorzes:
function idcheck(){
    let getid = $('jid').value;
    let kuldendoid = {
        'id' : getid
    };
    aszinkronKeresId(kuldendoid);

}
window.onload = idcheck;