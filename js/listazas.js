//segédfüggvény:
function $(id){
    return document.getElementById(id);
}

function darabnoveles(id){
    if($(`darab_${id}`).value<10){
        szam = Number($(`darab_${id}`).value)+1;
        $(`darab_${id}`).value = szam;
    }
}

function darabcsokkentes(id){
    if($(`darab_${id}`).value>1){
        szam = Number($(`darab_${id}`).value)-1;
        $(`darab_${id}`).value = szam;
    }
}

async function aszinkronKeresListazas(){
    try {
        let keres = await fetch('./php/index.php/listazas', {
            method : 'POST',
        });
        let eredmeny = await keres.json();
        let hossz = (eredmeny.valasz).length;
        let kathossz = (eredmeny.kategoriak).length;
        for(let x=0; x<kathossz; x++){
            var kategoria = eredmeny.kategoriak[x]['nev'];
            var kategoriaid = eredmeny.kategoriak[x]['id'];
            var katdarab = 0;
            for(let i=0; i<hossz; i++){
                if(eredmeny.valasz[i]['kategoria']==kategoriaid && katdarab==0){
                    $("termekkartyak").innerHTML += `<div style='width: 100%; font-size: 1.4em; padding-top: 1em;'><center>${kategoria}</center></div>`;
                    katdarab+=1;
                }
                if(eredmeny.valasz[i]['kategoria']==kategoriaid){
                    $("termekkartyak").innerHTML += `
                    <div class='col-lg'>
                    <br>
                            <div id='termek_${eredmeny.valasz[i]["etel_id"]}' class='card'>
                                <div class='card-body'>
                                <img src='${eredmeny.valasz[i]["etel_kep_url"]}' class='card-img-top' alt='...'>
                                <div class='kartyatartalom'>
                                <div class='termek-cim-container'><div class='termek-cim'><h5 class='card-title'>${ eredmeny.valasz[i]["etel_nev"] }</h5></div></div>
                                <div class='termek-ar-container'><div class='termek-ar'><p class='card-text'>${eredmeny.valasz[i]["etel_ar"]} Ft.-</p></div></div>
                                <div class='termek-mennyiseg-container'><div class='termek-mennyiseg'><img class='kevesebbikon' style='cursor: pointer;' onClick='darabcsokkentes(${eredmeny.valasz[i]["etel_id"]});' src='ikon/kevesebb.svg'></img> <input class='mennyisegszam' value='1' disabled style='border: 0; color: black; outline: none; text-align: center;' id='darab_${eredmeny.valasz[i]["etel_id"]}' /> <img class='tobbikon' style='cursor: pointer;' onClick='darabnoveles(${eredmeny.valasz[i]["etel_id"]});' src='ikon/tobb.svg'></img><br><div style='padding-bottom:0.3em;'></div></div></div>
                                <div class='kosar-gomb-container'><div class='kosar-gomb'><a onClick=kosarHozzaadas(${eredmeny.valasz[i]["etel_id"]},"${eredmeny.valasz[i]["etel_nev"].replace(/ /g, '_')}") class='btn btn-primary'>Kosárba tesz</a></div></div>
                                </div>
                                </div>
                            </div>
                
                        </div>
                    `;
                }
            }};

    } catch (error) {
        console.log(error);
    }
}

window.onload = aszinkronKeresListazas();

function kosarHozzaadas(id,nev){
    let kosartartalma = JSON.parse(localStorage.getItem("kosar"));
    let db = $(`darab_${id}`).value;
    
    
    if(!(kosartartalma.includes(id))){
        for(let i = 0; i<db; i++){
            kosartartalma.push(id);
            localStorage.setItem("kosar",JSON.stringify(kosartartalma));
       }
       
       let kosarlista = JSON.parse(localStorage.getItem("kosar"));
       $("kosardarab").textContent = kosarlista.length;
        $('ertesites_container').innerHTML = `<div id='ertesites' class='hiba' style='background-color:#aeff9e; color: #062100; border: 1px solid #195e0b;'><b>Termék kosárba téve!</b><br>Termék neve: ${nev}<br>Mennyiség: ${db}</div>`;
        $(`termek_${id}`).style.animationName = 'kosarbateve';
        $(`termek_${id}`).style.animationDuration = '0.5s';
        $(`termek_${id}`).style.animationFillMode = 'both';
        setTimeout(function(){
            $(`termek_${id}`).style.animationName = null;
            $(`termek_${id}`).style.animationDuration = null;
            $(`termek_${id}`).style.animationFillMode = null;
        }, 500);
    }
    else{
        console.log(id);
        console.log(kosartartalma);
        $('ertesites_container').innerHTML = `<div id='ertesites' class='hiba'><b>A termék már a kosárban van!</b><br>Ha más feltételekkel adnád a kosárhoz, akkor először töröld ki a kosárból!</div>`;       
        
    }
    $('ertesites_container').style.animationName = "hibaani";
    $('ertesites_container').style.animationDuration = "4s";
    $('ertesites_container').style.animationFillMode = "both";
    setTimeout(function(){
        $('ertesites_container').style.visibility = "hidden";
        $('ertesites_container').style.opacity = "0";
        $('ertesites_container').innerHTML = "";
        $('ertesites_container').style.animationName = null;
        $('ertesites_container').style.animationDuration = null;
        $('ertesites_container').style.animationFillMode = null;
    }, 4000);
    
    
    
}