<?php 
$zinute = "";
$Rezervuotojo_tikslus_laikas = null; // ši reikšmė pakis prisiregistravus
$diena = diena();
function diena(){
	if(isset($_GET['submit_data'])){
		return $_GET['data'];
	} else {
		return date('Y-m-d');
	}
}
?>

<?php
if(isset($_COOKIE['Rezervuotojo_diena'])){
    $Rezervuotojo_diena = $_COOKIE['Rezervuotojo_diena'];
    $Rezervuotojo_laikas = $_COOKIE['Rezervuotojo_laikas'];
    $Rezervuotojo_tikslus_laikas =  strtotime("$Rezervuotojo_diena $Rezervuotojo_laikas");
    $tiksli_rezervacija = Rezervacija::find_by_id($_COOKIE['Rezervuotojo_id']);
    if($tiksli_rezervacija){
        if($Rezervuotojo_tikslus_laikas>time() && $tiksli_rezervacija->id == $_COOKIE['Rezervuotojo_id']){             //jeigu rezervacijos laikas ir data dar neatėjo, taip pat jeigu rezervacija buvo ištrinta administratoriaus
            ?>   
            <div class="alert alert-info">
            <?php 
                echo "Jūs esate sėkmingai užsiregistravęs ";
                echo $_COOKIE['Rezervuotojo_diena'];
                echo " dieną, ";
                echo $_COOKIE['Rezervuotojo_laikas'];
                echo " valandą, vardu ir pavarde ";
                echo $_COOKIE['Rezervuotojo_vardas'] . " " . $_COOKIE['Rezervuotojo_pavarde'] . ".<br>";
                echo "Jeigu norite atšaukti registraciją, spauskite ";
                
                echo "<b><a onClick=\"javascript: return confirm('Ar tikrai norite atšaukti rezervacija?'); \" class='text-danger' ";
                echo "href='includes/delete_rezervacija.php?id=";
                echo $_COOKIE['Rezervuotojo_id'];
                echo "'>čia</a></b>";
            ?>
            </div>
            <?php
        } else{                                  //jeigu laikas jau praėjo, reikia atnaujinti cookies
            $cookie->panaikintiRezervacija();
        }
    } else {
        echo "<div class='alert alert-warning'>Panašu kad jūsų rezervacija buvo atšaukta. Prašome rezervuotis iš naujo</div>";
        $cookie->panaikintiRezervacija();    //jeigu duomenų bazėje nebėra įrašo, reikia atnaujinti cookies
    }
}
?>

<!-- <?php if(isset($zinute)){
    echo "<div class='alert alert-warning'>";
    echo $zinute;
    echo "</div>";
} else {
    echo "ka yra";
}
?> -->


<form method="GET">
    <div class="form-group">
        <label for="data">Pasirinkite dieną</label>
        <input class="form-control" type="date" name="data" value="<?php echo $diena; ?>" />
		</div>		
		<div class="form-group">		
        <input class="btn btn-primary" type="submit" name="submit_data" value="Pasirinkti datą"/>
    </div>
</form>

<?php 

if(isset($_POST['submit_rezervuoti'])){        
    $rezervacija = new Rezervacija();  

    if(empty($_POST['vardas'])){
        $zinute = 'Įrašykite savo vardą';
    } else {
        $rezervacija->vardas = $_POST['vardas'];
    } 

    if(empty($_POST['pavarde'])){   
        $zinute = 'Įrašykite savo pavardę';
    } else {
        $rezervacija->pavarde = $_POST['pavarde'];
    }
    
    if(empty($_POST['email'])){   
        $zinute = 'Įrašykite savo el. pašto adresą';
    } else {
        $rezervacija->email = $_POST['email'];
    }
    
    if(empty($_POST['phone'])){   
        $zinute = 'Įrašykite savo telefono nr.';
    } else {
        $rezervacija->phone = $_POST['phone'];
    }

    if(empty($_POST['laikas'])){   
        $zinute = 'Pasirinkite jums tinkamą laiką';
    } else {
        $rezervacija->rezervacijos_laikas = $_POST['laikas'];
    }

    $rezervacija->rezervacijos_diena = $diena;
    $rezervacija->iraso_data = date('Y-m-d H:i:s');
    $rezervacija->apsilankymas = Rezervacija::kiekKartuLankesi($rezervacija->vardas, $rezervacija->pavarde) + 1;
    if($zinute == ""){
        if($rezervacija->create() && $cookie->uzrezervuota($rezervacija->id,$rezervacija->vardas, $rezervacija->pavarde, $rezervacija->email, $rezervacija->phone, $rezervacija->rezervacijos_diena, $rezervacija->rezervacijos_laikas)){
            redirect("index.php");
        }              
        
      //  echo "<div class='alert alert-success'>Jūs sėkmingai užsiregistravote</div>";
    } else {
        echo "<div class='alert alert-warning'>" . $zinute . "</div>";
    }
}
?>

<?php 
if(isset($_GET['submit_data']) && $Rezervuotojo_tikslus_laikas < time()){
    $diena = $_GET['data'];
    if(Rezervacija::darboPabaigosLaikas($diena) > time()){  
?>
    <form id="anketosToggle" method="POST">
        <div class='form-group'>        
        <label for="laikas">Pasirinkite laiką</label>

            <select class='form-control' name='laikas'>
                        <option value=''>Pasirinkite laiką</option>
                        <?php
                        foreach (Rezervacija::laisvuVietuKiekis($diena) as $rezervacija) {
                            echo "<option value='{$rezervacija['laikas']}' ";
                            echo postOptionSelected('laikas', $rezervacija['laikas']);
                            echo ">{$rezervacija['laikas']}     ";
                            echo "|| Laisvų vietų: {$rezervacija['laisvos_vietos']}</option>";
                        }
                        ?>      


            </select>
        </div>
        <div class='form-group'> 
            <label for="vardas">Jūsų vardas</label>
            <input class="form-control" type="text" name="vardas" placeholder="Iveskite savo vardą" <?php postValue('vardas') ?> >
        </div>
        <div class='form-group'> 
            <label for="pavarde">Jūsų pavardė</label>
            <input class="form-control" type="text" name="pavarde" placeholder="Iveskite savo pavardę" <?php postValue('pavarde') ?> >
        </div>
        <div class='form-group'> 
            <label for="email">El. pašto adresas</label>
            <input class="form-control" type="text" name="email" placeholder="Iveskite savo el. pašto adresą" <?php postValue('email') ?> >
        </div>
        <div class='form-group'> 
            <label for="email">Mob. tel. nr.</label>
            <input class="form-control" type="text" name="phone" placeholder="Iveskite savo mob. tel. numerį" <?php postValue('phone') ?> >
        </div>
        <div class='form-group'> 
            <input class='btn btn-primary' type='submit' name='submit_rezervuoti' value='Rezervuoti laiką'/>
        </div>

    <?php
    }
}
?>

</form>
