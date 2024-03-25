function fos()
{
    hasznaltidomin=8;
    hasznaltidomax=13;
const d = new Date();
const ora=d.getHours();
const gomb=document.getElementById("rendelesgomb");
const divr=document.getElementById("nemRendelhet")

if( ora<hasznaltidomin || ora>hasznaltidomax )
{
    //gomb.disabled=true;
    // gomb.onclick = '#'; EZ TESZI NEM KATTINTHATÓVÁ A GOMBOT. HA VÉGEZTÜNK VEGYÜK KI
    gomb.style.cursor = "not-allowed";
    gomb.style.backgroundColor = 'salmon';
        gomb.style.color = 'white';
        gomb.style.border=" 1px solid rgb(108, 0, 0)";
        divr.style.visibility = "visible";
        divr.style.opacity = "1";

}
else{
    gomb.disabled=false;
    divr.hidden=true;
}
}



window.addEventListener("load",fos);