function $(id){
    return document.getElementById(id);
}

let kosartartalom = JSON.parse(localStorage.getItem("kosar"));

var kosarinfok = [];
var osszesen = 0;

async function aszinkronKeresTermekLekeres(adat, id, utso){
    try {
        let keres = await fetch('./php/index.php/termekadatlekeres', {
            method : 'POST',
            body : JSON.stringify(adat)
        });
        let eredmeny = await keres.json();
            termekid = id;
            termekdarab = 0;
            for(let x=0; x<kosartartalom.length; x++){
                if(termekid == kosartartalom[x]){
                    termekdarab++;
                }

            }
            document.getElementById('szunetatvetel').style.opacity = 1;
            document.getElementById('szunetatvetel').style.visibility = "visible";
            document.getElementById('kosartartalom').innerHTML += `<div class='kosartermek'><img src='${eredmeny.etel_kep_url}'><div class='termeknev'><b>${eredmeny.etel_nev}</b> | ${termekdarab} db<br><span style='font-size: 0.8em;'>${eredmeny.etel_ar*termekdarab} Ft.- (${eredmeny.etel_ar} Ft.-/db)</span></div><div class='eltavolitasgomb'><a href='#' onClick='termekeltavolitas(${termekid}, "${eredmeny.etel_nev}")'><img style='width: 2em; object-fit: fill;' src='ikon/kuka.svg'></a></div></div>`;
            document.getElementById('kosartartalom').innerHTML += `<div style='padding-bottom: 1em;'></div>`;
            osszesen += eredmeny.etel_ar*termekdarab;
            if(utso == 1){               
                setTimeout(function(){
                    document.getElementById('vegosszeg').innerHTML += `<span style='font-size: 2em;'><b>Összesen:</b> <span id="totalAmount">${osszesen}</span> Ft.-</span>`;
                },2000);
            }
            
    } catch (error) {
        console.log(error);
    }
}

if(kosartartalom.length == 0){
    $('rendelesgombDiv').hidden=true;
    $('kosartartalom').innerHTML = `<span style='font-size: 2em;'>A kosár tartalma üres!</span><br><span style='font-size: 1em;'>Ideje hozzáadni valami!</span>
    `;
}
else{
    $('rendelesgombDiv').hidden=false;
    termekekEgyenkent = [];
    for(let i=0; i<kosartartalom.length; i++){
        if(!(termekekEgyenkent.includes(kosartartalom[i]))){
            termekekEgyenkent.push(kosartartalom[i]);
        }
    }
    for(let i=0; i<termekekEgyenkent.length; i++){
        let termekid = termekekEgyenkent[i];
        let kuldendo = {
            'id' : termekid,
        };
        var utolso = 0;
        if(i==termekekEgyenkent.length-1){
            var utolso = 1;
        }
        aszinkronKeresTermekLekeres(kuldendo, termekid, utolso);
    }
}

//Safari böngésző issue fix(?)
if($('kosartartalom').innerHTML=="")
{
    $('rendelesgombDiv').style.display="none";
}

function termekeltavolitas(id,nev){
    if (confirm(`Biztos, hogy el akarod távolítani a kosárból a "${nev}" terméket?`) == true) {
        let kosartartalom = JSON.parse(localStorage.getItem("kosar"));
        let ujkosar = [];
        for(let x=0; x<kosartartalom.length; x++){
            if(kosartartalom[x]!=id){
                ujkosar.push(kosartartalom[x]);
            }
        }
        localStorage.setItem("kosar",JSON.stringify(ujkosar));
        window.location.href = 'kosar';
    }
}