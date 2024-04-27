let id = localStorage.getItem('userid');
uid={
    'userid': id
}
console.log(id);
const kajaktomb = [];

var eredmenykajak=null;

async function termekekLeker(){
    try {
        let keres = await fetch('./php/index.php/termekekLeker', {
            method : 'POST'});
        eredmenykajak = await keres.json();
        localStorage.setItem('kajaadatok',JSON.stringify(eredmenykajak));
        let jelen = id;
        jelen=JSON.parse(jelen);
    } 
    catch (error) {
        console.log(error);
    }
}



async function korabbiRendelesek(userid){
    try {
        let keres = await fetch('./php/index.php/korabbiRendelesek', {
            method : 'POST',
            body : JSON.stringify(
                userid
            )
        });
        let eredmeny = await keres.json();
        let jelen = id;
        jelen=JSON.parse(jelen);
        console.log(eredmeny);      
        
        if (eredmeny != "") {
            for (const adat of eredmeny) {
                if(adat.userid == jelen.userid)
                {
                    kartyaletrehoz(adat);
                }
            }
        }
    } 
    catch (error) {
        console.log(error);
    }
}



function kartyaletrehoz(adat)
{
    console.log(kajaktomb);
    const tartalom = adat.tartalom.split(",");
    console.log("tartalom: ",tartalom);
   
    
    let kartya=document.createElement("div");
    kartya.classList.add('kartya');
    let row=document.createElement("div");
    row.classList.add('row');
    let divbal=document.createElement("div");
    divbal.classList.add("col-9");
    divbal.classList.add("bal");
    
    
    
    let h5=document.createElement('h5');
    h5.classList.add('card-title');
    h5.classList.add('termeknev');
    h5.setAttribute('id','datum');
    h5.innerHTML=adat.rendeles_leadas;
    let p=document.createElement('p');
    p.classList.add('card-text');
    p.classList.add('kodszoveg');
    p.innerHTML="Kód: ";
    p.innerHTML+=adat.rendeleskod;
    let ul=document.createElement('ul');
    ul.classList.add('lista');
    //
    let kajaadatok = JSON.parse(localStorage.getItem('kajaadatok'));
    tartalom.forEach(termek => {
        console.log(termek);
        console.log("loop");

        for(i=0; i<kajaadatok.length; i++)
        {
            if(termek == kajaadatok[i].etel_id)
            {
                let li=document.createElement("li");
                 li.innerHTML=`${kajaadatok[i].etel_nev}  -  ${kajaadatok[i].etel_ar} Ft`;
                ul.appendChild(li);
            }

        }
     });    
    
//
    let statusz=document.createElement('p');
    console.log(adat.allapot);
    if(adat.allapot=="atveve"){
        statusz.innerHTML="Átvéve";
        statusz.classList.add('statusz_atveve');
    }
    else if(adat.allapot=="elutasitva"){
        statusz.innerHTML="Elutasítva";
        statusz.classList.add('statusz_elutasitva');
    }
    
    let divjobb=document.createElement("div");
    divjobb.classList.add("col-3");
    divjobb.classList.add("jobb");
    let p2=document.createElement("p")
    //p2.setAttribute('id',"ar");
    p2.classList.add('ar');
    p2.innerHTML="<span class='vegosszeg'>Végösszeg:</span> <br>"+adat.total+" Ft";

   
    divbal.appendChild(h5);
    divbal.appendChild(p);
    divbal.appendChild(ul);

    divjobb.appendChild(statusz);
    divjobb.appendChild(p2);
    
    row.appendChild(divbal);
    row.appendChild(divjobb);
    kartya.appendChild(row);

    $('korabbrendtartalom').appendChild(kartya);
    
}

window.addEventListener('load',termekekLeker);
window.addEventListener('load',korabbiRendelesek(uid));
