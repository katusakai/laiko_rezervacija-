<?php $rezervacijos = Rezervacija::laisvuVietuKiekis($diena); 
if(Rezervacija::darboPabaigosLaikas($diena) < time()){  
?>
  <div class="form-group">
    <label>Šios dienos visi laikai jau praėjo. Prašome pasirinkti tolimesnę dieną</label>
  </div>

<?php } elseif(empty($rezervacijos)) { ?>
  <div class="form-group">        
    <label>Laisvų vietų šiandien nebėra. Pamėginkite kitą dieną</label>
  </div>

<?php } else { ?>
<div class="form-group">
        <label for="data">Laisvų vietų kiekis <?php echo $diena?> dieną</label>
</div>
<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>Laikas</th>
        <th>Laisvų vietų kiekis</th>
      </tr>
    </thead>
		<tbody>
<?php 
  foreach ($rezervacijos as $rezervacija) {
		echo "<tr>";
		echo "<td>{$rezervacija['laikas']}</td>";
		echo "<td>{$rezervacija['laisvos_vietos']}</td>";
		echo "</tr>";
  }
}

?>
		</tbody>
	</table>
</div>	