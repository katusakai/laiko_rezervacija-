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
$rezervacijos = Rezervacija::laisvuVietuKiekis($diena);
foreach ($rezervacijos as $rezervacija) {
		echo "<tr>";
		echo "<td>{$rezervacija['laikas']}</td>";
		echo "<td>{$rezervacija['laisvos_vietos']}</td>";
		echo "</tr>";
}
?>
		</tbody>
	</table>
</div>	