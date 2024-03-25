<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/phpmailer/src/Exception.php';
require 'phpmailer/phpmailer/src/PHPMailer.php';
require 'phpmailer/phpmailer/src/SMTP.php';

    function randomid($length = 30) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;

}
class Query extends Mysqldb
{
    public function regUser($fnev, $jelszo, $email, $vnev, $knev)
    {
        //az érkezett adatok ne legyenek üresek:
        if (!empty($fnev) && !empty($jelszo) && !empty($email)) {
            //ellenőrizzük, hogy ilyen felhasználónév vagy emailcím van-e már az adatbázisban:
            $vanEilyen = "SELECT id 
                            FROM users
                            WHERE felhasznalonev = '{$fnev}' OR email ='{$email}'";
            $eredmeny = $this->getData($vanEilyen);


            //ha nincs még ilyen felhasználó, akkor felvesszük az adatbázisba:
            if (isset($eredmeny['uzenet'])) {
                $kikuldveE = "SELECT mikor,kesz 
                            FROM email_jovahagyas
                            WHERE email = '{$email}' or felhasznalonev = '{$fnev}'";
                $letezikE = $this->getData($kikuldveE);
                if((isset($letezikE['uzenet']) and $letezikE['uzenet'] == "Nincs találat!")){
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailid = randomid();
                        $jelszokodolo_str = "projektmunka2024";
                        $most = date("Y-m-d h:i:s");
                        $jelszo = hash_hmac('sha256',$jelszo,$jelszokodolo_str);
                        $default_avatar="default-avatar.jpg";
                        $set = "INSERT INTO `email_jovahagyas`(`id`, `felhasznalonev`, `jelszo`, `email`,`vezeteknev`,`keresztnev`,`mikor`) 
                                    VALUES ('{$emailid}','{$fnev}','{$jelszo}','{$email}','{$vnev}','{$knev}','{$most}');";

                        $mail=new PHPMailer(true);
                        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );
                        $mail->isSMTP();
                        $mail->Host='smtp.rackhost.hu';
                        $mail->SMTPAuth=true;
                        $mail->Username='info@munchify.hu';
                        $mail->Password='MunchifyProject24';
                        $mail->SMTPSecure='ssl';
                        $mail->Port = 465;
                        
                        $mail->setFrom('info@munchify.hu');
                        $mail->addAddress($email);
                        $mail->isHTML(true);
                        $mail->Subject="Munchify | Regisztracio";
                        $url = $_SERVER['HTTP_HOST'];
                        $mail->Body="<div style='padding-left: 10%; padding-right: 10%;'><span style='font-family: Verdana; font-size: 15px;'><center><img src='http://$url/img/munchify3.png' style='width: 20%;'/></center><hr>Szia, $knev!<br><br>A Munchify regisztrációd sikeres!<br>Az alábbi linken tudod jóváhagyni az email címedet!<br><br>http://$url/email_v?id=$emailid<br><br><b>A LINK 24 ÓRÁIG ÉRVÉNYES!<br>A LINKET CSAK EGYSZER LEHET MEGNYITNI!</b><br><hr><br>Munchify</span></div>";
            
                        $mail->send();
                        $uzenet = array('uzenet' => 'Sikeres művelet!');
                        return json_encode($this->setData($set), JSON_UNESCAPED_UNICODE);
                        return json_encode($uzenet, JSON_UNESCAPED_UNICODE);
                        //var_dump($email);
                    }
                    else{
                        $uzenet = array('uzenet' => 'Nem helyes a megadott email cím!');
                        return json_encode($uzenet, JSON_UNESCAPED_UNICODE);
                    }   
                }
                else{
                    $uzenet = array('uzenet' => 'Már létezik ilyen email címmel/felhasználónévvel kiküldve regisztráció. Fogadd el!');
                    return json_encode($uzenet, JSON_UNESCAPED_UNICODE);
                }
            }
            //ha van ilyen user, akkor erről tájékoztatjuk:
            else {
                $uzenet = array('uzenet' => 'Már foglalt felhasználónév/email!');
                return json_encode($uzenet, JSON_UNESCAPED_UNICODE);
            }
        }
        //valamelyik adat üresen érkezett:
        else {
            $uzenet = array('uzenet' => 'Hiányos adatok!');
            return json_encode($uzenet, JSON_UNESCAPED_UNICODE);
        }
    }
    public function loginUser($fnev, $jelszo)
    {
        //ne érkezzen üresen egyik adat se:
        if (!empty($fnev) && !empty($jelszo)) {
            $jelszokodolo_str = "projektmunka2024";
            
            $jelszo = hash_hmac('sha256',$jelszo,$jelszokodolo_str);
            //ellenőrizzük, hogy a felhasználónév jelszó páros megtalálható-e az adatbázisban:
            $fAdatok = "SELECT * FROM `users`
                            WHERE users.felhasznalonev = '{$fnev}' AND users.jelszo = '{$jelszo}'";
            
            $ellenorzes = $this->getData($fAdatok);
            //var_dump($ellenorzes);
            //nincs ilyen felhasználó:
            if (isset($ellenorzes['uzenet'])) {
                $uzenet = array('uzenet' => 'Belépés sikertelen!');
            }
            //van ilyen felhasználó, akkor indítjuk a sessiont:
            else {               
                $uzenet = array('uzenet' => 'Sikeres belépés!', 'jog' => $ellenorzes[0]['jogosultsag'], 'id' => $ellenorzes[0]['id']);
                session_start();
                $_SESSION['rang'] = $ellenorzes[0]['rang'];
                $_SESSION['felhasznalonev'] = strtolower($fnev);
                $_SESSION['email'] = $ellenorzes[0]['email'];
                $_SESSION['userid'] = $ellenorzes[0]['id'];
                $_SESSION['veznev']  = $ellenorzes[0]['vezeteknev'];
                $_SESSION['kernev'] = $ellenorzes[0]['keresztnev'];
                $_SESSION['jogosultsag'] = $ellenorzes[0]['jogosultsag'];
            }
        }
        //valamelyik adat üres:
        else {
            $uzenet = array('uzenet' => 'Kérem adja meg az adatokat!');
        }
        return json_encode($uzenet, JSON_UNESCAPED_UNICODE);
    }

    public function elfelejtettJelszo($email)
    {
        //ne érkezzen üresen egyik adat se:
        if (!empty($email)) {
            $vanEilyenFiok = "SELECT felhasznalonev FROM `users` WHERE email='{$email}'";
            $ellenorzes = $this->getData($vanEilyenFiok);
            $uz = array('uzenet' => '$email');
            if(isset($ellenorzes['uzenet'])){
                $uz = array('uzenet' => 'siker');
            }
            else{              
                $jelszoid = randomid();
                $most = date("Y-m-d H:i:s");
                $set = "INSERT INTO `jelszo_valtoztatas`(`id`, `email`, `mikor`) VALUES ('{$jelszoid}','{$email}','{$most}')";
                
                $elhelyezes = $this->setData($set);

                $mail=new PHPMailer(true);
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                $mail->isSMTP();
                $mail->Host='smtp.rackhost.hu';
                $mail->SMTPAuth=true;
                $mail->Username='info@munchify.hu';
                $mail->Password='MunchifyProject24';
                $mail->SMTPSecure='ssl';
                $mail->Port = 465;
                
                $mail->setFrom('info@munchify.hu');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject="Munchify | Elfelejtett jelszo";
                $url = $_SERVER['HTTP_HOST'];
                $mail->Body="<div style='padding-left: 10%; padding-right: 10%;'><span style='font-family: Verdana; font-size: 15px;'><center><img src='http://$url/img/munchify3.png' style='width: 20%;'/></center><hr>Szia!<br><br>A Munchify fiókhoz tartozó jelszavadat az alábbi linken tudod megváltoztatni!<br><br>http://$url/jelszo_v?id=$jelszoid<br><br><b>A LINK 1 ÓRÁIG ÉRVÉNYES!</b><br><hr><br>Munchify</span></div>";
    
                $mail->send();        
                $uz = array('uzenet' => 'siker');
            }
            return json_encode($uz, JSON_UNESCAPED_UNICODE);
            }
            
        //valamelyik adat üre
    }

    public function rendelesListazas()
    {
        $sql = "SELECT * FROM rendelesek WHERE `allapot`='kesz' OR `allapot`='folyamatban'";
        $rendelesadatok = $this->getData($sql);

        $uz = array('uzenet' => $rendelesadatok);
        return json_encode($uz, JSON_UNESCAPED_UNICODE);

    }
    public function termekBetoltes()
    {
        $sql = "SELECT * FROM etelek WHERE `aktiv`='1'";
        $termekadatok = $this->getData($sql);

        $uz = array('uzenet' => $termekadatok);
        return json_encode($uz, JSON_UNESCAPED_UNICODE);

    }
    public function termekMegtekinto($id)
    {
        $sql = "SELECT * FROM etelek WHERE `etel_id`='$id'";
        $termekinfok = $this->getData($sql);

        $uz = array('uzenet' => $termekinfok);
        return json_encode($uz, JSON_UNESCAPED_UNICODE);

    }
    public function arValtoztatas($id,$ujar)
    {
        $sql = "UPDATE `etelek` SET `etel_ar`='$ujar' WHERE `etel_id`='$id'";
        $feltolt = $this->setData($sql);

        $uz = array('uzenet' => 'kesz', 'ujar' => "$ujar");
        return json_encode($uz, JSON_UNESCAPED_UNICODE);

    }
    public function statuszValt($id)
    {
        $sql = "SELECT `elfogyott` FROM `etelek` WHERE etel_id='$id'";
        $aktivstatusz = $this->getData($sql)[0]['elfogyott'];
        if($aktivstatusz=='0'){
            $sql = "UPDATE `etelek` SET `elfogyott`='1' WHERE etel_id='$id'";
            $aktivstatusz = $this->setData($sql);
        }
        else{
            $sql = "UPDATE `etelek` SET `elfogyott`='0' WHERE etel_id='$id'";
            $aktivstatusz = $this->setData($sql);
        }
        $uz = array('uzenet' => 'kesz');
        return json_encode($uz, JSON_UNESCAPED_UNICODE);

    }
    public function kategoriaBetoltes()
    {
        $sql = "SELECT * FROM kategoriak";
        $kategoriak = $this->getData($sql);

        $uz = array('uzenet' => $kategoriak);
        return json_encode($uz, JSON_UNESCAPED_UNICODE);
    }
    public function kategoriaHozzaadas($kategoria)
    {
        $sql = "INSERT INTO kategoriak(nev) VALUES ('{$kategoria}')";
        $feltolt = $this->setData($sql);

        $uz = array('uzenet' => "kesz");
        return json_encode($uz, JSON_UNESCAPED_UNICODE);

    }
    public function rendelesKesz($id)
    {
        $sql = "UPDATE `rendelesek` SET `allapot`='kesz' WHERE `rendeles_id`='$id'";
        $rendelesadatok = $this->setData($sql);
        
        $sql = "SELECT * FROM rendelesek WHERE rendeles_id='$id'";
        $rendelesadat = $this->getData($sql);

        $rendelesszam = $rendelesadat[0]["rendeleskod"];
        $felhasznalo_id = $rendelesadat[0]["felhasznalo_id"];

        $sql = "SELECT * FROM users WHERE id='$felhasznalo_id'";
        $email = $this->getData($sql)[0]["email"];

        $mail=new PHPMailer(true);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->isSMTP();
        $mail->Host='smtp.rackhost.hu';
        $mail->SMTPAuth=true;
        $mail->Username='info@munchify.hu';
        $mail->Password='MunchifyProject24';
        $mail->SMTPSecure='ssl';
        $mail->Port = 465;
        
        $mail->setFrom('info@munchify.hu');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject="Munchify | Rendeles statusz";
        $url = $_SERVER['HTTP_HOST'];
        $mail->Body="<div style='padding-left: 10%; padding-right: 10%;'><span style='font-family: Verdana; font-size: 15px;'><center><img src='http://$url/img/munchify3.png' style='width: 20%;'/></center><hr>Szia!<br><br>A <b>$rendelesszam</b> számú rendelésed státusza megváltozott!<br><br><span style='font-size: 20px;'><b>KÉSZ</b></span><br>A rendelésed átveheted a büfében!<br>Jó étvágyat! :)<hr><br>Munchify</span></div>";

        $mail->send();

        $uz = array('uzenet' => 'kesz');
        return json_encode($uz, JSON_UNESCAPED_UNICODE);
    }
    public function rendelesElutasit($id,$indok)
    {
        $sql = "UPDATE `rendelesek` SET `allapot`='elutasitva', `indok`='$indok' WHERE `rendeles_id`='$id'";
        $rendelesadatok = $this->setData($sql);
        
        $sql = "SELECT * FROM rendelesek WHERE rendeles_id='$id'";
        $rendelesadat = $this->getData($sql);

        $rendelesszam = $rendelesadat[0]["rendeleskod"];
        $felhasznalo_id = $rendelesadat[0]["felhasznalo_id"];

        $sql = "SELECT * FROM users WHERE id='$felhasznalo_id'";
        $email = $this->getData($sql)[0]["email"];

        $mail=new PHPMailer(true);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->isSMTP();
        $mail->Host='smtp.rackhost.hu';
        $mail->SMTPAuth=true;
        $mail->Username='info@munchify.hu';
        $mail->Password='MunchifyProject24';
        $mail->SMTPSecure='ssl';
        $mail->Port = 465;
        
        $mail->setFrom('info@munchify.hu');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject="Munchify | Rendeles statusz";
        $url = $_SERVER['HTTP_HOST'];
        $mail->Body="<div style='padding-left: 10%; padding-right: 10%;'><span style='font-family: Verdana; font-size: 15px;'><center><img src='http://$url/img/munchify3.png' style='width: 20%;'/></center><hr>Szia!<br><br>A <b>$rendelesszam</b> számú rendelésed státusza megváltozott!<br><br><span style='font-size: 20px;'><b>ELUTASÍTVA</b></span><br>Indok: $indok<br><br>Elnézést kérünk a kellemetlenségekért!<hr><br>Munchify</span></div>";

        $mail->send();

        $uz = array('uzenet' => 'kesz');
        return json_encode($uz, JSON_UNESCAPED_UNICODE);
    }
    public function rendelesAtveve($id)
    {
        $sql = "UPDATE `rendelesek` SET `allapot`='atveve' WHERE `rendeles_id`='$id'";
        $rendelesadatok = $this->setData($sql);
        
        $uz = array('uzenet' => 'kesz');
        return json_encode($uz, JSON_UNESCAPED_UNICODE);
    }
    public function TermekAdatLekeres($id)
    {
        $sql = "SELECT * FROM etelek WHERE etel_id='$id'";
        $eteladatok = $this->getData($sql);
        
        $uz = array('etel_nev' => $eteladatok[0]['etel_nev'],'etel_kep_url' => $eteladatok[0]['etel_kep_url'], 'etel_ar' => $eteladatok[0]['etel_ar']);

        return json_encode($uz, JSON_UNESCAPED_UNICODE);

    }
    public function RendelesTermek($id, $db, $vegosszeg, $rendeleskod, $rendelesleadas, $felhasznaloid)
    {
        $sql = "SELECT * FROM etelek WHERE etel_id='$id'";
        $eteladatok = $this->getData($sql);

        $uz = array('etel_nev' => $eteladatok[0]['etel_nev'], 'etel_ar' => $eteladatok[0]['etel_ar'], 'db' => $db, 'vegosszeg' => $vegosszeg, 'rendeleskod' => $rendeleskod, 'rendelesleadas' => $rendelesleadas, 'felhasznaloid' => $felhasznaloid);

        return json_encode($uz, JSON_UNESCAPED_UNICODE);

    }
	public function jelszoVid($id)
    {
        $sql = "SELECT * FROM `jelszo_valtoztatas` WHERE id='{$id}'";
        $ell = $this->getData($sql);

        if(isset($ell['uzenet'])){
            $uz = array('uzenet' => 'nincs'); 
        }
        else{
            $kesz = $ell[0]['kesz'];
            $mikor = strtotime($ell[0]['mikor']);
            $most = strtotime(date("Y-m-d H:i:s"));

            if($mikor+3600<$most or $kesz==1){
                $uz = array('uzenet' => 'nincs');
            }
            else{
                $uz = array('uzenet' => 'jo');
            }
        }
        
        return json_encode($uz, JSON_UNESCAPED_UNICODE);

    }
    public function jelszoValtoztatas($id, $jelszo)
    {
            $lekeres = "SELECT email FROM `jelszo_valtoztatas` WHERE id='{$id}'";
            $ellenorzes = $this->getData($lekeres);
            $jelszokodolo_str = "projektmunka2024";
            $jelszo = hash_hmac('sha256',$jelszo,$jelszokodolo_str);

            if(isset($ellenorzes['uzenet'])){
                $uz = array('uzenet' => 'nincs');
            }
            else{              
                $email = $ellenorzes[0]['email'];
                $sql = "UPDATE `jelszo_valtoztatas` SET `kesz`='1' WHERE id='{$id}'";
                $modositas = $this->setData($sql);
                
                $sql = "UPDATE `users` SET `jelszo`='{$jelszo}' WHERE email='{$email}'";
                $modositas = $this->setData($sql);

                $uz = array('uzenet' => 'kesz');
            }
            return json_encode($uz, JSON_UNESCAPED_UNICODE);
    }

    public function emailEllenorzes($emailid)
    {
        //ne érkezzen üresen egyik adat se:
        if (!empty($emailid)) {
            $adatok = "SELECT * FROM `email_jovahagyas`
                            WHERE email_jovahagyas.id = '{$emailid}'";
            $ellenorzes = $this->getData($adatok);

            //var_dump($ellenorzes);
            
            //nincs ilyen
            if (isset($ellenorzes['uzenet'])) {
                $uzenet = array('uzenet' => '<b>A megadott kulcs érvénytelen vagy lejárt!</b>');
            }
            //van ilyen
            else {
                $felhasznalonev = $ellenorzes[0]['felhasznalonev'];
                $jelszo = $ellenorzes[0]['jelszo'];
                $email = $ellenorzes[0]['email'];
                $vezeteknev = $ellenorzes[0]['vezeteknev'];
                $keresztnev = $ellenorzes[0]['keresztnev'];
                $mikor = strtotime($ellenorzes[0]['mikor']);
                $kesz = $ellenorzes[0]['kesz'];
                
                $most = strtotime(date("Y-m-d h:i:s"));

                if((($mikor+86400)>$most) and $kesz!=1){
                    $iktatas_prompt = "INSERT INTO `users`(`felhasznalonev`, `jelszo`, `email`, `vezeteknev`, `keresztnev`, `rang`) 
                    VALUES ('{$felhasznalonev}','{$jelszo}','{$email}','{$vezeteknev}','{$keresztnev}','Muncher')";

                    $feltoltes = $this->setData($iktatas_prompt);

                    $deaktivalas_prompt = "UPDATE `email_jovahagyas` 
                    SET `kesz`='1' WHERE email_jovahagyas.id='$emailid'";

                    $kiutes = $this->setData($deaktivalas_prompt);

                    $uzenet = array('uzenet' => '<b>Sikeres regisztráció!</b><br>Visszairányítunk a weboldalra!');
                }
                else{
                    $uzenet = array('uzenet' => '<b>A megadott kulcs érvénytelen vagy lejárt!</b>');
                }
            }
        }
        //valamelyik adat üres:
        else {
            $uzenet = array('uzenet' => '<b>A megadott kulcs érvénytelen vagy lejárt!</b>');
        }
        return json_encode($uzenet, JSON_UNESCAPED_UNICODE);
    }
	public function listazas()
	{
		$sql = "SELECT * FROM etelek WHERE elfogyott='0'";
		$kartyak = $this->getData($sql);
        $sql = "SELECT * FROM kategoriak";
		$kategoria = $this->getData($sql);

		$uzenet = array('valasz' => $kartyak, 'kategoriak' => $kategoria);
		return json_encode($uzenet, JSON_UNESCAPED_UNICODE);
	}

    public function RendelesFeltolt($userid, $tartalom, $kod, $total, $nev, $szunet)
    {
        $datum=date("Y-m-d H:i:s");

        $set = "INSERT INTO `rendelesek`(`felhasznalo_id`, `nev`, `rendeles_tartalom`, `szunet`, `rendeles_leadas`, `total`, `rendeleskod`,`allapot`,`indok`)
         VALUES ('$userid', '$nev', '$tartalom', '$szunet', '$datum','$total','$kod','folyamatban','');";
        $this->setData($set);
    }

    public function RendelesLeker($userid)
    {
        $sqll="SELECT * FROM `rendelesek` WHERE felhasznalo_id = '{$userid}' AND (allapot = 'folyamatban' OR allapot = 'kesz')";
        $rendelesadat = $this->getData($sqll);    

		return json_encode($rendelesadat, JSON_UNESCAPED_UNICODE);
    }

    public function korabbiRendelesek($userid)
    {
        //trimeli a [] karaktereket a rendelés tartalmából, hogy majd csak ',' karakterenként splitelje a javascript
        $set="SELECT REPLACE(TRIM(']' FROM `rendeles_tartalom`),'[','') AS tartalom , `rendeles_id`,`felhasznalo_id`,`rendeles_leadas`,`rendeleskod`,`total`,`szunet` FROM `rendelesek` WHERE `felhasznalo_id`= '{$userid}';";
        //$set="SELECT * FROM `rendelesek` WHERE felhasznalo_id = '{$userid}' AND allapot = 'folyamatban' OR allapot = 'kesz';";
        $korabbi = $this->getData($set);
		
		return json_encode($korabbi, JSON_UNESCAPED_UNICODE);
    }

    public function termekekLeker()
    {

        $set="SELECT * FROM `etelek` WHERE 1;";
        $osszestermek = $this->getData($set);
		
		return json_encode($osszestermek, JSON_UNESCAPED_UNICODE);
    }

    public function logOut()
    {
        session_start();
        unset($_SESSION['fnev']);
        unset($_SESSION['jog']);
        unset($_SESSION['nev']);
        unset($_SESSION['osztaly']);
        unset($_SESSION['userid']);
        unset($_SESSION['email']);
        unset($_SESSION['profilkep']);
        session_destroy();
    }
}
        
    
 //nemtom
