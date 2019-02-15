<?php $diena = diena();
function diena(){
	if(isset($_GET['submit_data'])){
		return $_GET['data'];
	} else {
		return date('Y-m-d');
	}
}
?>
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
if(isset($_GET['submit_data'])){
	$diena = $_GET['data'];
?>
<form method="POST">
    <div class='form-group'>        
    <label for="laikas">Pasirinkite laiką</label>
        <select class='form-control' name='laikas'>
					<option value=''>Pasirinkite laiką</option>
					<?php
					foreach (Rezervacija::laisvuVietuKiekis($diena) as $rezervacija) {
						echo "<option value='{$rezervacija['laikas']}'>{$rezervacija['laikas']}     || Laisvų vietų: {$rezervacija['laisvos_vietos']}</option>";
					}
					?>      


        </select>
    </div>
    <div class='form-group'> 
        <label for="vardas">Jūsų vardas</label>
        <input class="form-control" type="text" name="vardas" placeholder="Iveskite savo vardą">
    </div>
    <div class='form-group'> 
        <label for="pavarde">Jūsų pavardė</label>
        <input class="form-control" type="text" name="pavarde" placeholder="Iveskite savo pavardę">
    </div>
    <div class='form-group'> 
        <label for="email">El. pašto adresas</label>
        <input class="form-control" type="text" name="email" placeholder="Iveskite savo el. pašto adresą">
    </div>
    <div class='form-group'> 
        <label for="email">Mob. tel. nr.</label>
        <input class="form-control" type="text" name="phone" placeholder="Iveskite savo mob. tel. numerį">
    </div>
    <div class='form-group'> 
        <input class='btn btn-primary' type='submit' name='submit_rezervuoti' value='Rezervuoti laiką'/>
    </div>

<?php
}
if(isset($_POST['submit_rezervuoti'])){
    $rezervacija = new Rezervacija();    
    $rezervacija->vardas = $_POST['vardas'];
    $rezervacija->pavarde = $_POST['pavarde'];
    $rezervacija->email = $_POST['email'];
    $rezervacija->phone = $_POST['phone'];
    $rezervacija->rezervacijos_diena = $diena;
    $rezervacija->rezervacijos_laikas = $_POST['laikas'];
    $rezervacija->iraso_data = date('Y-m-d H:i:s');
    $rezervacija->create();    
}
?>

</form>



