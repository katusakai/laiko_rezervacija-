<?php
class Rezervacija extends Db_object{
    protected static $db_table = "rezervacijos";
    protected static $db_table_fields = array('vardas', 'pavarde', 'email', 'phone', 'rezervacijos_diena', 'rezervacijos_laikas', 'iraso_data');
    public $id;
    public $vardas;
    public $pavarde;
    public $email;
    public $phone;
    public $rezervacijos_diena;
    public $rezervacijos_laikas;
    public $iraso_data; 

    private static $darbo_pradzia_val = 9;   //valandos
    private static $darbo_pradzia_min = 0;		//minute
    private static $darbo_pabaiga_val = 20;   //valandos
    private static $darbo_pabaiga_min = 0;		//minutes
    
    private static function darboPradzia(){
        return new DateTime(date("H:i", mktime(self::$darbo_pradzia_val, self::$darbo_pradzia_min)));
    }

    private static function darboPabaiga(){
        return new DateTime(date("H:i", mktime(self::$darbo_pabaiga_val, self::$darbo_pabaiga_min)));
    }

    public static function darboPabaigosLaikas($date){ 
            $darbo_laikas = self::darboPabaiga();
            $laikas = $darbo_laikas->format('H:i');
            return strtotime("$date $laikas");
        ;
    }
    
    public static function rezervacijosPagalDiena($data){
        return static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE rezervacijos_diena = '{$data}'");
    }

    private static function arLaisvasLaikas($laikas, $diena){  //suskaiciuoja kiek yra padarytų rezervacijų tuo metu
        $paimti_laikai = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE rezervacijos_laikas = '{$laikas}'AND rezervacijos_diena = '{$diena}' ");
        return count($paimti_laikai);
    }

    private static function galimiLaikai(){              //galimi darbo laikai pagal įvestas darbo valandas
        $darbo_laikas = self::darboPradzia();            
        $galimi_laikai = array();
    
        while($darbo_laikas != self::darboPabaiga()){
            global $diena;
            $laikas = $darbo_laikas->format('H:i');
            if(static::arLaisvasLaikas($laikas, $diena) < User::darbuotojuKiekis('kirpeja')){
                $darbo_laikas->modify('+30 minutes'); 
                array_push($galimi_laikai, $laikas);
            } else {
                
                $darbo_laikas->modify('+30 minutes');
            }
        }
        return $galimi_laikai;
    }
    public static function laisvuVietuKiekis($data){
        $rezervacijos = static::rezervacijosPagalDiena($data);
        $galimu_laiku_kiekis = array();
        foreach(static::galimiLaikai() as $laikas){
            $tikslus_laikas =  strtotime("$data $laikas");      //tikslus laikas palyginimui, kad nerodytų jau praėjusių laikų
            $laisvas_kiekis = User::darbuotojuKiekis('kirpeja') - static::arLaisvasLaikas($laikas,$data);
            if($laisvas_kiekis > 0 && $tikslus_laikas > time()){
                $galimu_laiku_kiekis_papild = array('laikas' => $laikas, 'laisvos_vietos' => $laisvas_kiekis);                
                array_push($galimu_laiku_kiekis, $galimu_laiku_kiekis_papild ); 
            }
        }
        return $galimu_laiku_kiekis;          //returns array su galimu laiku ir laisvų vietų skaičiumi, jeigu vietų yra
    }

    public static function findBySearch($search){
        $sql = "SELECT * FROM " . static::$db_table . " 
                WHERE vardas LIKE '%$search%' 
                OR pavarde LIKE '%$search%'
                OR email LIKE '%$search%'
                OR phone LIKE '%$search%'";
        return static::find_by_query($sql);
    }

    public static function findBySearchLimited($search, $page_number, $limit, $column, $sort_order){
        $sql = "SELECT * FROM " . static::$db_table . " 
                WHERE vardas LIKE '%$search%' 
                OR pavarde LIKE '%$search%'
                OR email LIKE '%$search%'
                OR phone LIKE '%$search%'
                OR rezervacijos_diena = '$search'
                ORDER BY {$column} {$sort_order},
                rezervacijos_diena DESC,
                rezervacijos_LAIKAS ASC
                LIMIT {$page_number}, {$limit}";
        return static::find_by_query($sql);
    }
}
?>