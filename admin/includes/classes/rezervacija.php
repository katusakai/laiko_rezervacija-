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
    
    public static function rezervacijosPagalDiena($data){
        return static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE rezervacijos_diena = '{$data}'");
    }

    private static function arLaisvasLaikas($laikas, $diena){  //suskaiciuoja kiek yra padarytų rezervacijų tuo metu
        $paimti_laikai = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE rezervacijos_laikas = '{$laikas}'AND rezervacijos_diena = '{$diena}' ");
        return count($paimti_laikai);
    }

    private static function galimiLaikai(){              //galimi darbo laikai pagal įvestas darbo valandas
        $darbo_pradzia_val = 9;   //valandos
        $darbo_pradzia_min = 0;		//minutes
        $darbo_laikas = new DateTime(date("H:i", mktime($darbo_pradzia_val, $darbo_pradzia_min)));
    
        $darbo_pabaiga_val = 20;   //valandos
        $darbo_pabaiga_min = 0;		//minutes
        $darbo_pabaiga = new DateTime(date("H:i", mktime($darbo_pabaiga_val, $darbo_pabaiga_min)));
    
        $galimi_laikai = array();
    
        while($darbo_laikas != $darbo_pabaiga){
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
            $laisvas_kiekis = User::darbuotojuKiekis('kirpeja') - static::arLaisvasLaikas($laikas,$data);
            if($laisvas_kiekis > 0 ){
                $galimu_laiku_kiekis_papild = array('laikas' => $laikas, 'laisvos_vietos' => $laisvas_kiekis);                
                array_push($galimu_laiku_kiekis, $galimu_laiku_kiekis_papild ); 
            }
        }
        return $galimu_laiku_kiekis;          //returns array su galimu laiku ir laisvų vietų skaičiumi, jeigu vietų yra
    }
}
?>