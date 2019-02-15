<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">
            Visos rezervacijos
        </h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Vardas</th>
                    <th>Pavarde</th>
                    <th>Email</th>
                    <th>Tel. nr.</th>
                    <th>Diena</th>
                    <th>Laikas</th>
                </tr>
                </thead>
                <tbody>
        
        <?php 
            $rezervacijos = Rezervacija::find_all();
            foreach ($rezervacijos as $irasas) {
                echo "<tr>";
                echo "<td>{$irasas->vardas}</td>";
                echo "<td>{$irasas->pavarde}</td>";
                echo "<td>{$irasas->email}</td>";
                echo "<td>{$irasas->phone}</td>";
                echo "<td style='min-width:90px'>{$irasas->rezervacijos_diena}</td>";
                echo "<td>{$irasas->rezervacijos_laikas}</td>";
                echo "</tr>";                            
            }
        ?>
                </tbody>
            </table>   
        </div>    
    </div>
</div>
<!-- /.row -->
