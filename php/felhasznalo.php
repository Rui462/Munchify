<?php

    if ($_SESSION["jogosultsag"]!=0){
        header("Location: index");
    }
    else{
        $conn = mysqli_connect("mysql.rackhost.hu", "c64772munchify", "MunchifyProject24", "c64772munchifydb");
        $uid = $_SESSION["userid"];
        $sql = "SELECT * FROM `rendelesek` WHERE `felhasznalo_id`='$uid' AND (`allapot`='folyamatban' OR `allapot`='kesz')";
        $query = mysqli_query($conn, $sql);
        $allapot = mysqli_fetch_all($query);
        if(count($allapot)!=0 AND $_SERVER['REQUEST_URI']!="/rendeles"){
            header("Location: rendeles");
        }
    }
?>