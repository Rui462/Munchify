function $(id){
    return document.getElementById(id);
}

if(typeof localStorage.getItem('kosar') == "undefined" || localStorage.getItem('kosar') == null){
    const kosarlista = [];
    localStorage.setItem("kosar",JSON.stringify(kosarlista));
}

let kosarlista = JSON.parse(localStorage.getItem("kosar"));

$("kosardarab").innerHTML = kosarlista.length;

function kosarszamfrissites(){
    let kosarlista = JSON.parse(localStorage.getItem("kosar"));
    $("kosardarab").innerHTML = kosarlista.length;
}

function kosarHozzaadas(id,nev,db){
    let kosartartalma = JSON.parse(localStorage.getItem("kosar"));
    
    for(let i = 0; i<db; i++){
         kosartartalma.push(id);
         localStorage.setItem("kosar",JSON.stringify(kosartartalma));
    }
    kosarszamfrissites();
}
