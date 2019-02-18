<?php 
class Cookie {

    public function uzrezervuota($id, $vardas, $pavarde, $email, $phone, $rezervacijos_diena, $rezervacijos_laikas){       
        $laikas = time() + (86400 * 30 * 3); // 86400 = 1 day | iš viso 3 mėnesiai        
        setcookie('Rezervuotojo_id', $id, $laikas, "/"); 
        setcookie('Rezervuotojo_vardas', $vardas, $laikas, "/"); 
        setcookie('Rezervuotojo_pavarde', $pavarde, $laikas, "/"); 
        setcookie('Rezervuotojo_email', $email, $laikas, "/"); 
        setcookie('Rezervuotojo_phone', $phone, $laikas, "/"); 
        setcookie('Rezervuotojo_diena', $rezervacijos_diena, $laikas, "/"); 
        setcookie('Rezervuotojo_laikas', $rezervacijos_laikas, $laikas, "/"); 
        return true;
    }    

    public function panaikintiRezervacija(){  
        setcookie('Rezervuotojo_vardas', '', 1, "/"); 
        setcookie('Rezervuotojo_pavarde', '', 1, "/"); 
        setcookie('Rezervuotojo_email', '', 1, "/"); 
        setcookie('Rezervuotojo_phone', '', 1, "/"); 
        setcookie('Rezervuotojo_diena', '', 1, "/"); 
        setcookie('Rezervuotojo_laikas', '', 1, "/");
        setcookie('Rezervuotojo_id', '', 1, "/");
    }
}
$cookie = new Cookie();
?>