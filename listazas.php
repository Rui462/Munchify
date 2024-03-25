<?php
  $kep=$row["etel_kep_url"];
  $nev=$row["etel_nev"];
  $nevelkuldesre = str_replace(array("\r", "\n","\t"," "), '_', $nev);
  $ar=$row["etel_ar"];
  $id=$row["etel_id"];
echo"
    <div class='col-lg'>
    <br>
            <div id='termek_$id' class='card'>
                <div class='card-body'>
				<img src='$kep' class='card-img-top' alt='...'>
				<div class='kartyatartalom'>
                  <div class='termek-cim-container'><div class='termek-cim'><h5 class='card-title'>$nev</h5></div></div>
                  <div class='termek-ar-container'><div class='termek-ar'><p class='card-text'>$ar Ft.-</p></div></div>
				  <div class='termek-mennyiseg-container'><div class='termek-mennyiseg'><img class='kevesebbikon' style='cursor: pointer;' onClick='darabcsokkentes($id);' src='ikon/kevesebb.svg'></img> <input class='mennyisegszam' value='1' disabled style='border: 0; color: black; outline: none; text-align: center;' id='darab_$id' /> <img class='tobbikon' style='cursor: pointer;' onClick='darabnoveles($id);' src='ikon/tobb.svg'></img><br><div style='padding-bottom:0.3em;'></div></div></div>
                  <div class='kosar-gomb-container'><div class='kosar-gomb'><a onClick=kosarHozzaadas($id,'$nevelkuldesre') class='btn btn-primary'>Kosárba tesz</a></div></div>
                  
                </div>
				</div>
              </div>

          </div>";
?>