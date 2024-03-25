<?php
class Route
{
    private $teljesUrl;
    private $url;
    private $erkezettAdatok;
    private $eleres;

    //konstruktorral beállítjuk a szükséges tulajdonságokat:
    public function __construct($adottUrl)
    {
        $this->teljesUrl = $adottUrl;
        $this->url = explode('/',$this->teljesUrl);
        $this->erkezettAdatok = json_decode(file_get_contents('php://input'),false);
        $this->eleres = 'content/';
    }

    //az url végződés alapján döntjük el, mit kell betölteni vagy elvégezni:
    //a kérés érkezhet JS-sel vagy akár egy linkre kattintva, ide fut be:
    public function urlRoute()
    {
        switch (end($this->url))
        {
            case 'regisztracio' :
                $user = new Query();
                echo $user->regUser(                    
                    $this->erkezettAdatok->fnev, 
                    $this->erkezettAdatok->jelszo, 
                    $this->erkezettAdatok->email,
                    $this->erkezettAdatok->vezeteknev,
                    $this->erkezettAdatok->keresztnev);
                break;
            case 'bejelentkezes' :
                $user = new Query();
                echo $user->loginUser($this->erkezettAdatok->fnev, $this->erkezettAdatok->jelszo);
                break;
            case 'email_ellenorzes' :
                $user = new Query();
                echo $user->emailEllenorzes($this->erkezettAdatok->emailid);
                break;
            case 'elfelejtett_jelszo' :
                $user = new Query();
                echo $user->elfelejtettJelszo($this->erkezettAdatok->email);
                break;
            case 'jelszo_v' :
                $user = new Query();
                echo $user->jelszoValtoztatas($this->erkezettAdatok->id, $this->erkezettAdatok->jelszo);
                break;
            case 'jelszo_v_idcheck' :
                $user = new Query();
                echo $user->jelszoVid($this->erkezettAdatok->id);
                break;
			case 'listazas' :
                $user = new Query();
                echo $user->listazas();
                break;
			case 'termekadatlekeres' :
                $user = new Query();
                echo $user->TermekAdatLekeres($this->erkezettAdatok->id);
                break;
            case 'rendeles_listazas' :
                $user = new Query();
                echo $user->rendelesListazas();
                break;
            case 'rendeleskesz' :
                $user = new Query();
                echo $user->rendelesKesz(
                    $this->erkezettAdatok->id
                );
                break;
            case 'rendeleselutasit' :
                $user = new Query();
                echo $user->rendelesElutasit(
                    $this->erkezettAdatok->id,
                    $this->erkezettAdatok->indok
                );
                break;
            case 'rendelesatveve' :
                $user = new Query();
                echo $user->rendelesAtveve(
                    $this->erkezettAdatok->id
                );
                break;
            case 'termekbetoltes' :
                $user = new Query();
                echo $user->termekBetoltes();
                break;
            case 'armegvaltoztatas' :
                $user = new Query();
                echo $user->arValtoztatas(
                    $this->erkezettAdatok->id,
                    $this->erkezettAdatok->ujar
                );
                break;
            case 'statuszvaltas' :
                $user = new Query();
                echo $user->statuszValt(
                    $this->erkezettAdatok->id
                );
                break;
            case 'termekmegtekinto' :
                $user = new Query();
                echo $user->termekMegtekinto(
                    $this->erkezettAdatok->id
                );
                break;
            case 'kategoriabetoltes' :
                $user = new Query();
                echo $user->kategoriaBetoltes();
                break;
            case 'kategoriahozzaadas' :
                $user = new Query();
                echo $user->kategoriaHozzaadas(
                    $this->erkezettAdatok->kategoria
                );
                break;
            case 'rendelestermek' :
                $user = new Query();
                echo $user->RendelesTermek(
                    $this->erkezettAdatok->id,
                    $this->erkezettAdatok->db,
                    $this->erkezettAdatok->vegosszeg,
                    $this->erkezettAdatok->rendeleskod,
                    $this->erkezettAdatok->rendelesleadas,
                    $this->erkezettAdatok->felhasznaloid
                );
                break;
            case 'rendel' :
                $user = new Query();
                echo $user->RendelesFeltolt(
                    $this->erkezettAdatok->userid, 
                    $this->erkezettAdatok->tartalom, 
                    $this->erkezettAdatok->kod,
                    $this->erkezettAdatok->total,
                    $this->erkezettAdatok->nev,
                    $this->erkezettAdatok->szunet
                );
                break;
            case 'rendelesLekeres' : 
                $user = new Query();
                echo $user->RendelesLeker(
                    $this->erkezettAdatok->userid
                );
                break;
            case 'korabbiRendelesek' : 
               $user = new Query();
               echo $user->korabbiRendelesek(
                $this->erkezettAdatok->userid
                 );
                break;
            case 'termekekLeker' : 
               $user = new Query();
                echo $user->termekekLeker(
                 );          
                break;
        }
    }
}
?>