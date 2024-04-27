function $(id){
    return document.getElementById(id);
}
function getRandomInt(max) {
    return Math.floor(Math.random() * max);
}

//aszinkron kérés regisztráció függvény
async function aszinkronKeresRendel(adat){
    try {
        let keres = await fetch('./php/index.php/rendel', {
            method : 'POST',
            body : JSON.stringify(adat)
        });
        window.location.href = "home";
        
    } catch (error){
        console.log(error);
    }
}

//rendeles JSON:
function Rendel(){
    let userid = document.getElementById("FelhID").value;
    let tartalom = localStorage.getItem("kosar");
    let kod = getRandomInt(999);
    let total = document.getElementById("totalAmount").innerText;
    let nev = document.getElementById("felnev").value;
    let megjegyzes = document.getElementById("dropdown_gomb").value;
        if(megjegyzes!="0"){     
            let kuldendo = {
                'userid': userid,
                'tartalom': tartalom,
                'kod' : kod,
                'total' : total,
                'nev' : nev,
                'szunet' : megjegyzes
            };
            $('userIDstorage').value="";
            localStorage.removeItem('kosar');
            if(tartalom!=null){
                aszinkronKeresRendel(kuldendo);
            }
            else{
                window.location.href = "home";
            }
        }
        else{
            alert("Nem adtál meg átvételi időpontot.");
        }
}