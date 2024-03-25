<?php
    if ($_SESSION["jogosultsag"]!=1){
        header("Location: index");
    }

    function generateRandomString($length = 30) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    if(isset($_POST['feltoltve'])){
        if(isset($_POST["termeknev"]) and isset($_POST["termekar"]) and isset($_POST["kategoria"]) and $_POST["kategoria"]!='0'){
            $file = $_FILES['file'];
            $nev = generateRandomString();
            move_uploaded_file($file['tmp_name'], 'food_imgs/' . $nev);

            $conn = mysqli_connect("88.132.223.56", "Frankfurt", "Frankfurt123", "munchifydb");
            
            $lol = $_POST['termeknev'];
            $lol2 = $_POST['termekar'];
            $lol3 = $_POST['kategoria'];
            
            $sql="INSERT INTO `etelek`(`etel_nev`, `etel_kep_url`, `etel_ar`, `kategoria`) VALUES ('$lol','food_imgs/$nev.jpg','$lol2','$lol3')";
            mysqli_query($conn, $sql);
            echo "<script>alert('Sikeres termékfeltöltés!');</script>";
        }
        else{
            echo "<script>alert('A feltöltéshez szükséges adatok nem lettek megfelelően kitöltve!');</script>";
        }
    }
?>