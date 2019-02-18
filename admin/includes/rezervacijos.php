<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">
            Visos rezervacijos
        </h2>

        <div class="well">
            <form action="" method="GET">
                <div class="input-group"> 
                    <label for="search">Paieška</label>
                </div>
                <div class="input-group">                    
                    <input name="search" type="text" class="form-control" <?php postValue('search')?>>
                    <span class="input-group-btn">
                        <button name="search_submit" class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </span>
                </div>
            </form>        
        </div>

    
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
                    <?php if($session->ifAdmin()){ ?>
                    <th>Ištrinti</th>
                    <?php }?>
                </tr>
                </thead>
                <tbody>
        
        <?php 
        $limit = 20; //reik mainstreamint
            if(isset($_GET['search_submit'])){
                $search = $_GET['search'];
                $rezervacijos = Rezervacija::find_by_search($search);
                $page_number = pageNr($rezervacijos, $limit);
                $query_count = queryCount($rezervacijos, $limit);
                $rezervacijos = Rezervacija::find_by_search_limit($search, $page_number, $limit);
                
            } else {
                $rezervacijos = Rezervacija::find_all();
                $page_number = pageNr($rezervacijos, $limit);
                $query_count = queryCount($rezervacijos, $limit);
                $rezervacijos = Rezervacija::find_all_limit($page_number, $limit);
            }


            
            foreach ($rezervacijos as $irasas) {
                echo "<tr>";
                echo "<td>{$irasas->vardas}</td>";
                echo "<td>{$irasas->pavarde}</td>";
                echo "<td>{$irasas->email}</td>";
                echo "<td>{$irasas->phone}</td>";
                echo "<td style='min-width:90px'>{$irasas->rezervacijos_diena}</td>";
                echo "<td>{$irasas->rezervacijos_laikas}</td>";
                if($session->ifAdmin()){
                    echo "<td><a onClick=\"javascript: return confirm('Ar tikrai norite ištrinti?'); \" class='text-danger' href='includes/delete_rezervacija.php?id=" . $irasas->id ."'>Ištrinti<a></td>";
                }
                echo "</tr>";                            
            }
             
        ?>
                </tbody>
            </table> 
         </div>    
    </div>
    <div class="col-md-12 text-center">
        <!-- Pagination start -->
        <ul class="pagination">
        <?php
            if($query_count>5){
                for($i = 1 ; $i <= $query_count ; $i++){
                    echo "<li class='";
                    ifActive();
                    echo "'><a href='?";
                    ifSearch();
                    echo "page=$i'>$i</a></li>";
                }
            } else {
                for($i = 1 ; $i <= $query_count ; $i++){
                    echo "<li class='";
                    ifActive();
                    echo "'><a href='?";
                    ifSearch();
                    echo "page=$i'>$i</a></li>";
                }
            } 
        
        ?>
        </ul>
        <!-- Pagination end -->  
    </div>
</div>
<!-- /.row -->
