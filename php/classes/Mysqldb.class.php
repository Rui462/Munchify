<?php
class Mysqldb {
    //beállítjuk a szükséges tulajdonságokat:
    private $host = "";
    private $user = "";
    private $pwd = "";
    private $name = "";
    private $db;

    //létrehozza az adatbázis kapcsolatot (példányosításkor lefut):
    public function __construct(){
            $this->db = new mysqli($this->host,$this->user,$this->pwd, $this->name);
    }

    //adatok lekérése valamely táblából (SELECT utasításokhoz):
    protected function getData(string $sql){
            $result = $this->db->query($sql);
            if ($this->db->errno == 0){
                if ($result->num_rows != 0){
                    $data = $result->fetch_all(MYSQLI_ASSOC); 
                }
                else {
                    $data = array("uzenet" => "Nincs találat!");
                }      
            }
            else {
                $data = array("uzenet"=>$this->db->error);
            }
        //Mindenképp a $data-val tér vissza a függvény:
        return $data;
    }

    //adatok felvitele/módosítása/törlése a táblákba(n):
    protected function setData($sql){
            //$message;
            $result = $this->db->query($sql);
            if (is_bool($result) && $result){
                $message = array('uzenet'=>'Sikeres művelet!');
                return $message;
            }
            else {
                $message = array('uzenet'=>'Sikertelen művelet!');
                return $message;
            } 
    }
}

?>