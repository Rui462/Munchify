function $(id){
    return document.getElementById(id);
}
localStorage.removeItem('rendelesidk');
async function rendeleslistazasa(){
    try {
        let keres = await fetch('./php/index.php/rendeles_listazas', {
            method : 'POST',
        });
        let eredmeny = await keres.json();
        const rendelesidk = [];

        let hossz = (eredmeny.uzenet).length;
        for(let i=0; i<hossz; i++){
            rendelesidk.push(eredmeny.uzenet[i]["rendeles_id"]);
        }
        if(localStorage.getItem('rendelesidk')==null){
            localStorage.setItem('rendelesidk',JSON.stringify(rendelesidk));
            for(let i=0; i<hossz; i++){
                if(eredmeny.uzenet[i]["allapot"]=="folyamatban"){
                    var hatterszin = "#872020";
                    var allapotszoveg = "Folyamatban...";
                }
                if(eredmeny.uzenet[i]["allapot"]=="kesz"){
                    var hatterszin = "#208730";
                    var allapotszoveg = "Átvételre kész!";
                }
                document.getElementById('rendelesek').innerHTML += `<div style='width: 100%; border: 1px solid #e3e3e3; border-radius: 1em; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding: 0.6em;'><a class='rendelesgomb' onClick="rendelesmegjelenites('${eredmeny.uzenet[i]["rendeles_id"]}', '${eredmeny.uzenet[i]["nev"]}', '${eredmeny.uzenet[i]["rendeles_tartalom"]}', '${eredmeny.uzenet[i]["total"]}', '${eredmeny.uzenet[i]["rendeleskod"]}', '${eredmeny.uzenet[i]["rendeles_leadas"]}', '${eredmeny.uzenet[i]["felhasznalo_id"]}', '${eredmeny.uzenet[i]["arak_teteles"]}', '${eredmeny.uzenet[i]["allapot"]}', '${eredmeny.uzenet[i]["szunet"]}')">Rendelés #${eredmeny.uzenet[i]["rendeles_id"]} - ${eredmeny.uzenet[i]["nev"]}(${eredmeny.uzenet[i]["rendeleskod"]})</a><div style="float: right;"><span style='color: ${hatterszin}; padding-right: 1em;'>${allapotszoveg}</span>${eredmeny.uzenet[i]["rendeles_leadas"]}</div></div><div style='padding-top: 1em;'></div>`;
            }
        }
        else{
            if(localStorage.getItem('rendelesidk')==JSON.stringify(rendelesidk)){
            }
            else{
                const soundEffect = new Audio();
                soundEffect.autoplay = true;
    
                soundEffect.src = "data:audio/mpeg;base64,SUQzBAAAAAABEVRYWFgAAAAtAAADY29tbWVudABCaWdTb3VuZEJhbmsuY29tIC8gTGFTb25vdGhlcXVlLm9yZwBURU5DAAAAHQAAA1N3aXRjaCBQbHVzIMKpIE5DSCBTb2Z0d2FyZQBUSVQyAAAABgAAAzIyMzUAVFNTRQAAAA8AAANMYXZmNTcuODMuMTAwAAAAAAAAAAAAAAD/80DEAAAAA0gAAAAATEFNRTMuMTAwVVVVVVVVVVVVVUxBTUUzLjEwMFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVf/zQsRbAAADSAAAAABVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVf/zQMSkAAADSAAAAABVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV";
    
                soundEffect.src = './hangok/ujrendeles.mp3';
                localStorage.setItem('rendelesidk',JSON.stringify(rendelesidk));
                document.getElementById('rendelesek').innerHTML = "";
                for(let i=0; i<hossz; i++){
                    if(eredmeny.uzenet[i]["allapot"]=="folyamatban"){
                        var hatterszin = "#872020";
                        var allapotszoveg = "Folyamatban...";
                    }
                    if(eredmeny.uzenet[i]["allapot"]=="kesz"){
                        var hatterszin = "#208730";
                        var allapotszoveg = "Átvételre kész!";
                    }
                    document.getElementById('rendelesek').innerHTML += `<div style='width: 100%; border: 1px solid #e3e3e3; border-radius: 1em; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding: 0.6em;'><a class='rendelesgomb' onClick="rendelesmegjelenites('${eredmeny.uzenet[i]["rendeles_id"]}', '${eredmeny.uzenet[i]["nev"]}', '${eredmeny.uzenet[i]["rendeles_tartalom"]}', '${eredmeny.uzenet[i]["total"]}', '${eredmeny.uzenet[i]["rendeleskod"]}', '${eredmeny.uzenet[i]["rendeles_leadas"]}', '${eredmeny.uzenet[i]["felhasznalo_id"]}', '${eredmeny.uzenet[i]["arak_teteles"]}', '${eredmeny.uzenet[i]["allapot"]}', '${eredmeny.uzenet[i]["szunet"]}')">Rendelés #${eredmeny.uzenet[i]["rendeles_id"]} - ${eredmeny.uzenet[i]["nev"]}(${eredmeny.uzenet[i]["felhasznalo_id"]})</a><div style="float: right;"><span style='color: ${hatterszin}; padding-right: 1em;'>${allapotszoveg}</span>${eredmeny.uzenet[i]["rendeles_leadas"]}</div></div><div style='padding-top: 1em;'></div>`;
                }
            }
        }

    } catch (error) {
        console.log(error);
    }
}

async function rendeleslistazasa_nohang(){
    try {
        let keres = await fetch('./php/index.php/rendeles_listazas', {
            method : 'POST',
        });
        let eredmeny = await keres.json();
        const rendelesidk = [];

        let hossz = (eredmeny.uzenet).length;
        for(let i=0; i<hossz; i++){
            rendelesidk.push(eredmeny.uzenet[i]["rendeles_id"]);
        }
        if(localStorage.getItem('rendelesidk')==null){
            localStorage.setItem('rendelesidk',JSON.stringify(rendelesidk));
            for(let i=0; i<hossz; i++){
                if(eredmeny.uzenet[i]["allapot"]=="folyamatban"){
                    var hatterszin = "#872020";
                    var allapotszoveg = "Folyamatban...";
                }
                if(eredmeny.uzenet[i]["allapot"]=="kesz"){
                    var hatterszin = "#208730";
                    var allapotszoveg = "Átvételre kész!";
                }
                document.getElementById('rendelesek').innerHTML += `<div style='width: 100%; border: 1px solid #e3e3e3; border-radius: 1em; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding: 0.6em;'><a class='rendelesgomb' onClick="rendelesmegjelenites('${eredmeny.uzenet[i]["rendeles_id"]}', '${eredmeny.uzenet[i]["nev"]}', '${eredmeny.uzenet[i]["rendeles_tartalom"]}', '${eredmeny.uzenet[i]["total"]}', '${eredmeny.uzenet[i]["rendeleskod"]}', '${eredmeny.uzenet[i]["rendeles_leadas"]}', '${eredmeny.uzenet[i]["felhasznalo_id"]}', '${eredmeny.uzenet[i]["arak_teteles"]}', '${eredmeny.uzenet[i]["allapot"]}', '${eredmeny.uzenet[i]["szunet"]}')">Rendelés #${eredmeny.uzenet[i]["rendeles_id"]} - ${eredmeny.uzenet[i]["nev"]}(${eredmeny.uzenet[i]["rendeleskod"]})</a><div style="float: right;"><span style='color: ${hatterszin}; padding-right: 1em;'>${allapotszoveg}</span>${eredmeny.uzenet[i]["rendeles_leadas"]}</div></div><div style='padding-top: 1em;'></div>`;
            }
        }
        else{
            if(localStorage.getItem('rendelesidk')==JSON.stringify(rendelesidk)){
            }
            else{
                localStorage.setItem('rendelesidk',JSON.stringify(rendelesidk));
                document.getElementById('rendelesek').innerHTML = "";
                for(let i=0; i<hossz; i++){
                    if(eredmeny.uzenet[i]["allapot"]=="folyamatban"){
                        var hatterszin = "#872020";
                        var allapotszoveg = "Folyamatban...";
                    }
                    if(eredmeny.uzenet[i]["allapot"]=="kesz"){
                        var hatterszin = "#208730";
                        var allapotszoveg = "Átvételre kész!";
                    }
                    document.getElementById('rendelesek').innerHTML += `<div style='width: 100%; border: 1px solid #e3e3e3; border-radius: 1em; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding: 0.6em;'><a class='rendelesgomb' onClick="rendelesmegjelenites('${eredmeny.uzenet[i]["rendeles_id"]}', '${eredmeny.uzenet[i]["nev"]}', '${eredmeny.uzenet[i]["rendeles_tartalom"]}', '${eredmeny.uzenet[i]["total"]}', '${eredmeny.uzenet[i]["rendeleskod"]}', '${eredmeny.uzenet[i]["rendeles_leadas"]}', '${eredmeny.uzenet[i]["felhasznalo_id"]}', '${eredmeny.uzenet[i]["arak_teteles"]}', '${eredmeny.uzenet[i]["allapot"]}','${eredmeny.uzenet[i]["szunet"]}')">Rendelés #${eredmeny.uzenet[i]["rendeles_id"]} - ${eredmeny.uzenet[i]["nev"]}(${eredmeny.uzenet[i]["felhasznalo_id"]})</a><div style="float: right;"><span style='color: ${hatterszin}; padding-right: 1em;'>${allapotszoveg}</span>${eredmeny.uzenet[i]["rendeles_leadas"]}</div></div><div style='padding-top: 1em;'></div>`;
                }
            }
        }

    } catch (error) {
        console.log(error);
    }
}

async function rendelestermek(kuldendo){
    try {
        let keres = await fetch('./php/index.php/rendelestermek', {
            method : 'POST',
            body : JSON.stringify(kuldendo)
        });
         let eredmeny = await keres.json();
         document.getElementById('termektabla').innerHTML += `
            <tr>
                <td style='border: 1px solid #dedede;'>${eredmeny.etel_nev}</td>
                <td style='border: 1px solid #dedede;'>${eredmeny.db}</td>
                <td style='border: 1px solid #dedede;'>${eredmeny.etel_ar} Ft</td>
            </tr>
         `;
         document.getElementById('betoltes').innerText = "";
         document.getElementById('vegosszeglista').innerText = `Végösszeg: ${eredmeny.vegosszeg} Ft`;
    }
    catch (error) {
        console.log(error);
    }}

function rendelesmegjelenites(id, nev, termekek, vegosszeg, rendeleskod, rendelesleadas, felhasznaloid, arakteteles, allapot, szunet){
    document.getElementById('rendelesakt').style.opacity = "1";
    document.getElementById('rendelesakt').style.visibility = "visible";
    document.getElementById('rendelesakt').innerHTML = `<div style='z-index: 999999; background-color: white; width: 40%;' class='rendelesakt'><h3>Rendelés #${id} - ${rendeleskod}</h3><h6>Feladó: ${nev}</h6><hr>
    <div style='height: 10em; border: 1px solid #cfcfcf; overflow: scroll;'>
    <table style='width: 100%;' id='termektabla'>
        <tr>
            <th style='border: 1px solid black;'>Termék neve</th>
            <th style='border: 1px solid black;'>Mennyiség</th>
            <th style='border: 1px solid black;'>Összeg</th>
        </tr>
    </table>
    <center><span style='text-align: center;' id='betoltes'><br>
        <img src='/img/toltes.gif' style='width: 2em;'></img>
    </span></center>
    </div>
    <span id='vegosszeglista'></span><hr>
    <div style='padding-top: 0.3em;'></div>
    <b>Átvétel időpontja:</b> ${szunet}. szünet
    <div style='padding-top: 0.7em;'></div>
    <br>
    <div id='listazasl'>
    <table style='width: 100%;' id='termekl'>
        <tr id='termekekl'>`;
    if(allapot=="folyamatban"){
        document.getElementById('termekekl').innerHTML += `    
                <td style='width: 50%'><button style='width: 100%; padding: 0.2em; box-sizing: border-box; background-color: #29782b; color: white; border: 0;' onclick='rendeleskesz(${id})'>Rendelés kész</button></td>
                <td style='width: 50%'><button style='width: 100%; padding: 0.2em; box-sizing: border-box; background-color: #782929; color: white; border: 0;' onclick='rendeleselutasit(${id},${rendeleskod},"${nev}")'>Elutasítás</button></td>
            </tr>
        </table>
        </div>
        `;
        document.getElementById('listazasl').innerHTML += `<div style='padding-top: 0.7em;'></div><button style='width: 100%; padding: 0.2em; box-sizing: border-box; background-color: #a62626; color: white; border: 0;' onclick='rendelesbezar()'>Bezár</button></div>`;
    }
    else if(allapot="kesz"){
        document.getElementById('termekekl').innerHTML += `    
                <td style='width: 50%'><button style='width: 100%; padding: 0.2em; box-sizing: border-box; background-color: #29782b; color: white; border: 0;' onclick='rendelesatveve(${id})'>Átvéve</button></td>
                <td style='width: 50%'><button style='width: 100%; padding: 0.2em; box-sizing: border-box; background-color: #782929; color: white; border: 0;' onclick='rendeleselutasit(${id},${rendeleskod},"${nev}")'>Elutasítás</button></td>
            </tr>
        </table>
        </div>`;
        document.getElementById('listazasl').innerHTML += `<div style='padding-top: 0.7em;'></div><button style='width: 100%; padding: 0.2em; box-sizing: border-box; background-color: #a62626; color: white; border: 0;' onclick='rendelesbezar()'>Bezár</button></div>`;
    }
    const egyszer = new Set();

    for(let i = 0; i<JSON.parse(termekek).length; i++){
        egyszer.add(JSON.parse(termekek)[i]);
    }
    for(let i = 0; i<egyszer.size; i++){
        let db = 0;
        for(let x = 0; x<JSON.parse(termekek).length; x++){
            if(Array.from(egyszer)[i]==JSON.parse(termekek)[x]){
                db+=1;
            }
        }

        let kuldendo = {
            'id' : Array.from(egyszer)[i],
            'db' : db,
            'vegosszeg' : vegosszeg,
            'rendeleskod' : rendeleskod,
            'rendelesleadas' : rendelesleadas,
            'felhasznaloid' : felhasznaloid
        };
        rendelestermek(kuldendo);
    }
}

function rendelesbezar(){
    document.getElementById('rendelesakt').style.opacity = "0";
    document.getElementById('rendelesakt').style.visibility = "hidden"; 
}

async function kesz(kuldendo){
    try {
        let keres = await fetch('./php/index.php/rendeleskesz', {
            method : 'POST',
            body : JSON.stringify(kuldendo)
        });
         let eredmeny = await keres.json();
         if(eredmeny.uzenet=="kesz"){
            document.getElementById('rendelesek').innerHTML = "";
            localStorage.removeItem('rendelesidk');
            rendelesbezar();
            setTimeout(function(){
                rendeleslistazasa_nohang();
            }, 1000);
         }
    }
    catch (error) {
        console.log(error);
    }}


function rendeleskesz(id){
    let kuldendo = {
        'id' : id
    };
    kesz(kuldendo);
}

async function elutasit(kuldendo){
    try {
        let keres = await fetch('./php/index.php/rendeleselutasit', {
            method : 'POST',
            body : JSON.stringify(kuldendo)
        });
         let eredmeny = await keres.json();
         if(eredmeny.uzenet=="kesz"){
            rendelesbezar()
            document.getElementById('rendelesek').innerHTML = "";
            localStorage.removeItem('rendelesidk');
            setTimeout(function(){
                rendeleslistazasa_nohang();
            }, 1000);
         }
    }
    catch (error) {
        console.log(error);
    }}

async function atveve(kuldendo){
    try {
        let keres = await fetch('./php/index.php/rendelesatveve', {
            method : 'POST',
            body : JSON.stringify(kuldendo)
        });
         let eredmeny = await keres.json();
         if(eredmeny.uzenet=="kesz"){
            rendelesbezar()
            document.getElementById('rendelesek').innerHTML = "";
            localStorage.removeItem('rendelesidk');
            setTimeout(function(){
                rendeleslistazasa_nohang();
            }, 1000);
         }
    }
    catch (error) {
        console.log(error);
    }}

function rendelesatveve(id){
    let kuldendo = {
        'id' : id
    };
    atveve(kuldendo);
}

function rendeleselutasitasok(id){
    if (window.confirm('Biztos, hogy elutasítod a rendelést?'))
    {
        let indok = document.getElementById('indok').value;
        let kuldendo = {
            'id' : id,
            'indok' : indok
        };
        elutasit(kuldendo);
    }
    else
    {
        rendelesbezar();
    }
        
}

function rendeleselutasit(id, rendeleskod, nev){
    document.getElementById('rendelesakt').innerHTML = `<div style='z-index: 999999; background-color: white; width: 40%;' class='rendelesakt'><h3>Rendelés #${id} - ${rendeleskod} törlése</h3><h6>Feladó: ${nev}</h6><hr>
    <input type='text' style='width: 100%;' placeholder='Miért törlöd a rendelést?' id='indok'/>
    <div style='padding-top: 0.7em;'></div><button style='width: 100%; padding: 0.2em; box-sizing: border-box; background-color: #29782b; color: white; border: 0;' onclick='rendeleselutasitasok(${id})'>Rendelés elutasítása</button>
    <div style='padding-top: 0.7em;'></div><button style='width: 100%; padding: 0.2em; box-sizing: border-box; background-color: #a62626; color: white; border: 0;' onclick='rendelesbezar()'>Mégsem</button></div>`;
}

window.setInterval( function(){
    rendeleslistazasa();
  },1000)