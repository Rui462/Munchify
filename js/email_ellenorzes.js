//segédfüggvény:
function $(id){
    return document.getElementById(id);
}

//aszinkron kérésekhez általános függvény:
async function aszinkronKeres(adat, htmlelem){
    try {
        let keres = await fetch('./php/index.php/email_ellenorzes', {
            method : 'POST',
            body : JSON.stringify(adat)
        });
        let eredmeny = await keres.json();
        $('email_ellenorzes_info').innerHTML = eredmeny.uzenet;
        if(eredmeny.uzenet == "<b>Sikeres regisztráció!</b><br>Visszairányítunk a weboldalra!"){
            window.setTimeout(function(){
                window.location.href = "./index";
            }, 5000);
        }

    } catch (error) {
        console.log(error);
    }
}

//regisztráció:
function email_ellenorzes(){
    $('email_ellenorzes_info').innerHTML="";
    let emailid = $('emailid').value;

    let kuldendo = {
        'emailid' : emailid
    };
    $('emailid').innerHTML="";
    return aszinkronKeres(kuldendo, $('email_ellenorzes_info'));
}



window.onload = email_ellenorzes;