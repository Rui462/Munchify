async function kategoriabetoltes(){
    try {
        let keres = await fetch('./php/index.php/kategoriabetoltes', {
            method : 'POST',
        });
        let eredmeny = await keres.json();
        
        if(eredmeny.uzenet["uzenet"]=="Nincs találat!"){
            document.getElementById('kategoriavalaszto').innerHTML += `<option value='0' selected>NINCS TERMÉKKATEGÓRIA! (Adj hozzá kategóriát!)</option>`;
        }
        else{
            let hossz = (eredmeny.uzenet).length;
            for(let i=0; i<hossz;i++){
                let kategorianev = `${eredmeny.uzenet[i].nev}`;
                document.getElementById('kategoriavalaszto').innerHTML += `<option value='${eredmeny.uzenet[i]["id"]}'>${eredmeny.uzenet[i]["nev"]}</option>`;
                document.getElementById('termekkategoriak').innerHTML += `<div onclick='kategoriainfok(${eredmeny.uzenet[i]["id"]},"${kategorianev}")' style='cursor: pointer; width: 100%; border: 1px solid #c7c7c7; border-radius: 1em; padding: 0.5em; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;'>
                #${eredmeny.uzenet[i]["id"]} - ${eredmeny.uzenet[i]["nev"]}
                </div><div style='padding-top: 0.3em;'></div>`;
            }
        }
    } catch (error) {
        console.log(error);
    }
}

async function kategoriaaddbetoltes(){
    try {
        let keres = await fetch('./php/index.php/kategoriabetoltes', {
            method : 'POST',
        });
        let eredmeny = await keres.json();
        
        let hossz = (eredmeny.uzenet).length;
        for(let i=0; i<hossz;i++){
            console.log(eredmeny);
            var kategorianev = 'asd';
            document.getElementById('kategoriavalaszto').innerHTML += `<option value='${i+1}'>${eredmeny.uzenet[i]["nev"]}</option>`;
            document.getElementById('termekkategoriak').innerHTML += `<div onclick='kategoriainfok(${eredmeny.uzenet[i]["id"]},${kategorianev})' style='cursor: pointer; width: 100%; border: 1px solid #c7c7c7; border-radius: 1em; padding: 0.5em; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;'><br>
            #${eredmeny.uzenet[i]["id"]} - ${eredmeny.uzenet[i]["nev"]}
            </div>`;
        }
        
    } catch (error) {
        console.log(error);
    }
}

async function kategoriaadd(kuldendo){
    try {
        let keres = await fetch('./php/index.php/kategoriahozzaadas', {
            method : 'POST',
            body : JSON.stringify(kuldendo)
        });
        document.getElementById('termekkategoriak').innerHTML = "";
        document.getElementById('kategoriavalaszto').innerHTML = ``;
        document.getElementById('kategoriavalaszto').innerHTML = "<option value='0' selected>Kategória kiválasztása...</option>";
        let eredmeny = await keres.json();
            setTimeout(function(){
                kategoriabetoltes();
            }, 500);
    } catch (error) {
        console.log(error);
    }
}

async function archange(kuldendo){
    try {
        let keres = await fetch('./php/index.php/armegvaltoztatas', {
            method : 'POST',
            body : JSON.stringify(kuldendo)
        });
        let eredmeny = await keres.json();
        if(eredmeny.uzenet='kesz'){
            alert(`Sikeres ár változtatás! (Új ár: ${eredmeny.ujar} Ft)`);
            ablakbezar();
            document.getElementById('termekek').innerHTML='';
            termekbetoltes();
        }
    } catch (error) {
        console.log(error);
    }
}

async function statuszvalt(kuldendo){
    try {
        let keres = await fetch('./php/index.php/statuszvaltas', {
            method : 'POST',
            body : JSON.stringify(kuldendo)
        });
        let eredmeny = await keres.json();
        console.log(eredmeny.uzenet);
        if(eredmeny.uzenet='kesz'){
            alert(`Sikeres státusz változtatás!`);
            ablakbezar();
            document.getElementById('termekek').innerHTML='';
            termekbetoltes();
        }
    } catch (error) {
        console.log(error);
    }
}

async function kategoriainfo(kuldendo,nev,id){
    try {
        let keres = await fetch('./php/index.php/kategoriainfok', {
            method : 'POST',
            body : JSON.stringify(kuldendo)
        });
        let eredmeny = await keres.json();
        document.getElementById('ablak').style.opacity = '1';
        document.getElementById('ablak').style.visibility = 'visible';
        document.getElementById('ablak').style.position = 'fixed';
        document.getElementById('ablak').style.top = '50%';
        document.getElementById('ablak').style.left = '50%';
        document.getElementById('ablak').style.width = '100%';
        document.getElementById('ablak').style.height = '100%';
        document.getElementById('ablak').style.transform = 'translate(-50%, -50%)';
        document.getElementById('body').style.overflow = 'hidden';
        document.getElementById('ablak').innerHTML = `
        <div style='position: absolute; top: 50%; left: 50%; width: 50%; transform: translate(-50%, -50%); padding: 1em; background-color: white; border-radius: 1em;'>
            <div><h4>Kategória</h4><h6>${nev}</h6>
            <hr>
            Kategória alá tartozó termékek:<br><div style='padding-top: 0.3em;'></div>
            <div style='overflow: scroll; height: 10em;'>
            <table id='kategoriatermeklistazas' style='width: 100%;'>
                <tr style='border: 1px solid black;'>
                    <th>Termék név</th>
                </tr>
            </table>
            </div>
            <hr>
            Kategória törlése:<br><div style='padding-top: 0.3em;'></div>
            <button onclick='kategoriatorles(${id})' style='width: 100%; padding: 0.3em; box-sizing: border-box; background-color: #801416; color: white; border: 0;'>ELTÁVOLÍTÁS</button><hr>
            <button onclick='ablakbezar()' style='width: 100%; padding: 0.3em; box-sizing: border-box; background-color: #801416; color: white; border: 0;'>Kilépés</button>    
        </div>
        `;

        for(let i = 0; i<eredmeny.length; i++){
            document.getElementById('kategoriatermeklistazas').innerHTML += `
            <tr style='border: 1px solid black;'>
                <td>${eredmeny[i]['etel_nev']}</td>
            </tr>
            `;
        }
    } catch (error) {
        console.log(error);
    }
}

async function kategoriatorol(kuldendo){
    try {
        let keres = await fetch('./php/index.php/kategoriatorol', {
            method : 'POST',
            body : JSON.stringify(kuldendo)
        });
        document.getElementById('termekkategoriak').innerHTML='';
        document.getElementById('kategoriavalaszto').innerHTML = '';
        kategoriabetoltes();
        ablakbezar();

    } catch (error) {
        console.log(error);
    }
}

async function szunetbetoltes(){
    try {
        let keres = await fetch('./php/index.php/szunetbetoltes', {
            method : 'POST'
        });
        let eredmeny = await keres.json();
        console.log(eredmeny.rendelesszam);
        for(let i = 0; i<(eredmeny.rendelesszam).length; i++){
            document.getElementById("szunetedit").innerHTML += `
            ${eredmeny.rendelesszam[i]['szunet']}. Szünet: <input type='text' id='szunet${eredmeny.rendelesszam[i]['szunet']}' value='${eredmeny.rendelesszam[i]['darab']}'><button onClick='szunetmentes("${eredmeny.rendelesszam[i]['szunet']}")'>MENTÉS</button>
            <br>`;
        }
    } catch (error) {
        console.log(error);
    }
}


async function szunetmentesasync(kuldendo){
    try {
        let keres = await fetch('./php/index.php/szunetmentes', {
            method : 'POST',
            body : JSON.stringify(kuldendo)
        });        
        alert("Sikeresen mentve az új darabszám!");
    } catch (error) {
        console.log(error);
    }
}

async function termektorol(kuldendo){
    try {
        let keres = await fetch('./php/index.php/termektorles', {
            method : 'POST',
            body : JSON.stringify(kuldendo)
        });
        document.getElementById('termekek').innerHTML='';
        termekbetoltes();
    } catch (error) {
        console.log(error);
    }
}

async function termekkeresasync(kuldendo){
    try {
        let keres = await fetch('./php/index.php/termekkeres', {
            method : 'POST',
            body : JSON.stringify(kuldendo)
        });
        let eredmeny = await keres.json();
        document.getElementById('termekek').innerHTML='';
        for(let i=0; i<(eredmeny.uzenet).length; i++){
            if(eredmeny.uzenet[i]["elfogyott"]=='1'){
                var hatterszin = '#ffcfcf';
            }
            else if(eredmeny.uzenet[i]["aktiv"]=='0'){
                var hatterszin = '#b5b5b5';
            }
            else{
                var hatterszin = '#ffffff';
            }
            document.getElementById('termekek').innerHTML += `
            <div onclick='termektekinto(${eredmeny.uzenet[i]["etel_id"]})' style='cursor: pointer; background-color: ${hatterszin}; width: 100%; border: 1px solid #c7c7c7; border-radius: 1em; padding: 0.5em; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;'>
            <img style='width: 60px; height: 60px; border-radius: 1em; padding-right: 1em; object-fit: cover;' src='${eredmeny.uzenet[i]["etel_kep_url"]}'></img>${eredmeny.uzenet[i]["etel_nev"]} - ${eredmeny.uzenet[i]["etel_ar"]} Ft
            </div>
            <div style='padding-top: 0.3em;'></div>
            `;
        }

    } catch (error) {
        console.log(error);
    }
}

function kategoriahozzaadas(){
    let kuldendo = {
        'kategoria' : document.getElementById('kategorianev').value
    };
    kategoriaadd(kuldendo);
}

function szunetmentes(szunet){

    console.log(!isNaN(document.getElementById(`szunet${szunet}`).value));
    if(document.getElementById(`szunet${szunet}`).value!="" && !isNaN(document.getElementById(`szunet${szunet}`).value)){
        let kuldendo = {
            'szunet' : szunet,
            'ujido' : document.getElementById(`szunet${szunet}`).value
        };
        szunetmentesasync(kuldendo);
    }
    else{
        alert("Hibás a megadott szünet formátum");
    }    
}


function termekkeres(){
    let kuldendo = {
        'kereses' : document.getElementById('termeknevkeres').value
    };
    termekkeresasync(kuldendo);
}

function kategoriatorles(id){
    let kuldendo = {
        'id' : id
    };
    if (window.confirm('Biztos, hogy törölni akarod a kategóriát? (MINDEN ALÁ TARTOZÓ TERMÉK IS TÖRLŐDNI FOG!)'))
    {
        kategoriatorol(kuldendo);
    }
    
}

function kategoriainfok(id,nev){
    let kuldendo = {
        'id' : id
    };
    kategoriainfo(kuldendo,nev,id);
}

function feltoltveszoveg(){
    document.getElementById('feltoltesszoveg').innerText='Kép feltöltve!';
}

function termektorles(id){
    let kuldendo = {
        'id' : id
    };
    if (window.confirm('Biztos, hogy törölni akarod a terméket?'))
    {
        termektorol(kuldendo);
    }
}

function termekhozzaadas(){
    let kuldendo = {
        'id' : document.getElementById('kategorianev').value,
    };
    kategoriaadd(kuldendo);
}

async function termekmegtekinto(kuldendo){
    try {
        let keres = await fetch('./php/index.php/termekmegtekinto', {
            method : 'POST',
            body : JSON.stringify(kuldendo)
        });
        let eredmeny = await keres.json();
        document.getElementById('ablak').style.opacity = '1';
        document.getElementById('ablak').style.visibility = 'visible';
        document.getElementById('ablak').style.position = 'fixed';
        document.getElementById('ablak').style.top = '50%';
        document.getElementById('ablak').style.left = '50%';
        document.getElementById('ablak').style.width = '100%';
        document.getElementById('ablak').style.height = '100%';
        document.getElementById('ablak').style.transform = 'translate(-50%, -50%)';
        document.getElementById('body').style.overflow = 'hidden';
        if(eredmeny.uzenet[0]['elfogyott']==0){
            var elfogyottstatusz = "AKTÍV"
            var szin = "#335c2f";
            var gombszoveg = "TERMÉK INAKTÍVVÁ TÉTELE";
        }
        else{
            var elfogyottstatusz = "INAKTÍV"
            var szin = "#5c2f30";
            var gombszoveg = "TERMÉK AKTIVÁLÁSA";
        }
        document.getElementById('ablak').innerHTML = `
        <div style='position: absolute; top: 50%; left: 50%; width: 50%; transform: translate(-50%, -50%); padding: 1em; background-color: white; border-radius: 1em;'>
            <div style='float: left;'><h4>${eredmeny.uzenet[0]['etel_nev']}</h4><h6>Azonosító: #${eredmeny.uzenet[0]['etel_id']}</h6>
            <hr>
            Termék ára: <input type='text' id='etelar' value='${eredmeny.uzenet[0]['etel_ar']}'></input> Ft<br>
            <div style='padding-top: 0.3em;'></div>
            <input onclick='armegvaltoztat(${eredmeny.uzenet[0]['etel_id']})' type='button' style='width: 100%; border: 0; background-color: #4287f5; color: white;' value='Ár megváltoztatása'></input><br>
            <hr>
            <h6>Termék láthatóságának kezelése.</h6>    
            A termék jelenlegi státusza: <span style='color: white; background-color: ${szin}; padding: 0.3em;'>${elfogyottstatusz}</span>
            <br><br>
            <input type='button' style='width: 100%; border: 0; background-color: #4287f5; color: white;' id='statuszgomb' value='${gombszoveg}' onclick='statuszvaltas(${eredmeny.uzenet[0]['etel_id']})'></input><br><hr>
            <h6>Termék eltávolítása:</h6>
            <input type='button' style='width: 100%; border: 0; background-color: #6e1f1f; color: white;' id='statuszgomb' value='Termék eltávolítása' onclick='termektorles(${eredmeny.uzenet[0]['etel_id']})'></input><br><br>
            </div><img src='${eredmeny.uzenet[0]['etel_kep_url']}' style='width: 100px; height: 100px; object-fit: cover; float: right;'></img>
            <div style='float: left;'><hr></div>
            <button onclick='ablakbezar()' style='width: 100%; padding: 0.3em; box-sizing: border-box; background-color: #801416; color: white; border: 0;'>Kilépés</button>    
        </div>
        `;

    } catch (error) {
        console.log(error);
    }
}

function ablakbezar(){
    document.getElementById('ablak').innerHTML = '';
    document.getElementById('ablak').style.opacity = '0';
    document.getElementById('ablak').style.visibility = 'hidden';
    document.getElementById('ablak').style.position = 'static';
    document.getElementById('ablak').style.top = '0%';
    document.getElementById('ablak').style.left = '0%';
    document.getElementById('ablak').style.width = '0%';
    document.getElementById('ablak').style.height = '0%';
    document.getElementById('ablak').style.transform = 'translate(-0%, -0%)';
    document.getElementById('body').style.overflow = 'visible';
    
}

function statuszvaltas(id){
    let kuldendo = {
        'id' : id
    };
    statuszvalt(kuldendo);
}

function armegvaltoztat(id){
    let kuldendo = {
        'id' : id,
        'ujar' : document.getElementById('etelar').value
    };
    archange(kuldendo);
}

function termektekinto(id){
    let kuldendo = {
        'id' : id
    };
    termekmegtekinto(kuldendo);
}

async function termekbetoltes(){
    try {
        let keres = await fetch('./php/index.php/termekbetoltes', {
            method : 'POST',
        });
        let eredmeny = await keres.json();
        for(let i=0; i<(eredmeny.uzenet).length; i++){
            if(eredmeny.uzenet[i]["elfogyott"]=='1'){
                var hatterszin = '#ffcfcf';
            }
            else if(eredmeny.uzenet[i]["aktiv"]=='0'){
                var hatterszin = '#b5b5b5';
            }
            else{
                var hatterszin = '#ffffff';
            }
            document.getElementById('termekek').innerHTML += `
            <div onclick='termektekinto(${eredmeny.uzenet[i]["etel_id"]})' style='cursor: pointer; background-color: ${hatterszin}; width: 100%; border: 1px solid #c7c7c7; border-radius: 1em; padding: 0.5em; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;'>
            <img style='width: 60px; height: 60px; border-radius: 1em; padding-right: 1em; object-fit: cover;' src='${eredmeny.uzenet[i]["etel_kep_url"]}'></img>${eredmeny.uzenet[i]["etel_nev"]} - ${eredmeny.uzenet[i]["etel_ar"]} Ft
            </div>
            <div style='padding-top: 0.3em;'></div>
            `;
        }
    } catch (error) {
        console.log(error);
    }
}

window.onload = kategoriabetoltes();
window.onload = termekbetoltes();
window.onload = szunetbetoltes();