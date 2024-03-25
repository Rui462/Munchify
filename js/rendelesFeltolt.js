function $(id){
    return document.getElementById(id);
}
//userID áthozva a rendelés oldalra localStorage segítségével
let felhid=localStorage.getItem('userid');
//console.log(userid);
//localStorage.removeItem('userid');
var userid={
    'userid':felhid
};
async function aszinkronKeresRendelesLekeres(userid){
    try {
        let keres = await fetch('./php/index.php/rendelesLekeres', {
            method : 'POST',
            body : JSON.stringify(userid)
        });
        let eredmeny = await keres.json();
        console.log(eredmeny);
        let kod=eredmeny[0].rendeleskod;
        console.log(kod);
        document.getElementById("rendelesSzam").innerText = kod;    
    } 
    catch (error) {
        console.log(error);
    }
}

async function statusCheck(userid){
    try {
        let keres = await fetch('./php/index.php/rendelesLekeres', {
            method : 'POST',
            body : JSON.stringify(userid)
        });
        let eredmeny = await keres.json();
        console.log(eredmeny);
        if(eredmeny.uzenet!="Nincs találat!"){
            let allapot=eredmeny[0].allapot;
            if (allapot == "kesz")
            {
                document.getElementById('statustext').innerText="A rendelésed elkészült! Átveheted a büfében!";
                if(document.getElementById('allapotjelzo').getAttribute('src') != "./img/check-green.gif")
                {
                    document.getElementById('allapotjelzo').setAttribute('src',"./img/check-green.gif");
                }     
            }
        }
        else{
            window.location.href="home";
        }
    } 
    catch (error) {
        console.log(error);
    }
}

window.addEventListener('load',aszinkronKeresRendelesLekeres(userid));
window.setInterval( function(){
    statusCheck(userid);
  },1000)