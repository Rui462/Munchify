let id = localStorage.getItem('userid');
uid={
    'userid': id
}
console.log(id);

const kajaktomb=[];

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


async function termekekLeker(){
    try {
        let keres = await fetch('./php/index.php/termekekLeker', {
            method : 'POST'});
        let eredmenykajak = await keres.json();
        let jelen = id;
        jelen=JSON.parse(jelen);
        console.log(eredmenykajak);       
        
        kartyaletrehoz(eredmenykajak)
       
    } 
    catch (error) {
        console.log(error);
    }
}
console.log(kajaktomb);

function kartyaletrehoz(adat,eredmenykajak)
{
    const fosok=adat.tartalom.split(",");
    console.log (adat.fosok);
    let fos=adat.rendeles_id;
    let kartya=document.createElement("div");
    kartya.classList.add('kartya');
    let row=document.createElement("div");
    row.classList.add('row');
    let divbal=document.createElement("div");
    divbal.classList.add("col-6");
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
    
    
    let li=document.createElement('li');
    li.innerHTML=adat.tartalom;

    let divjobb=document.createElement("div");
    divjobb.classList.add("col-6");
    divjobb.classList.add("jobb");
    let p2=document.createElement("p")
    p2.setAttribute('id',"ar");
    p2.innerHTML=adat.total+" Ft";



    

    ul.appendChild(li);
    divbal.appendChild(h5);
    divbal.appendChild(p);
    divbal.appendChild(ul);

    divjobb.appendChild(p2);
    
    row.appendChild(divbal);
    row.appendChild(divjobb);
    kartya.appendChild(row);

    $('korabbrendtartalom').appendChild(kartya);
    
}


window.addEventListener('load',korabbiRendelesek(uid));
window.addEventListener('load',termekekLeker);