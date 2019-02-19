<?php 

?>

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">
            Rezervacijos
        </h2>     
    <?php if(!isset($_GET['siandien'])){ ?>
        <div class="well">
            <form action="" method="GET">
                <div class="input-group"> 
                    <label for="search">Paieška</label>
                </div>
                <div class="input-group">                    
                    <input name="search" type="text" class="form-control" <?php postValue('search')?>>
                    <span class="input-group-btn">
                        <input class="form-control" type="date" name="data" <?php postValue('data')?>>
                    </span>
                    <span class="input-group-btn">
                        <button name="search_submit" class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </span>
                </div>
            </form>        
        </div>
    <?php }?>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>


                    <th><a class="customLink" href="<?php echo addOrUpdateUrlParam() ?>&column=vardas&order=<?php echo $asc_or_desc; ?>">Vardas</a></th>
                    <th><a class="customLink" href="<?php echo addOrUpdateUrlParam() ?>&column=pavarde&order=<?php echo $asc_or_desc; ?>">Pavardė</a></th>
                    <th><a class="customLink" href="<?php echo addOrUpdateUrlParam() ?>&column=email&order=<?php echo $asc_or_desc; ?>">El. Paštas</a></th>
                    <th><a class="customLink" href="<?php echo addOrUpdateUrlParam() ?>&column=phone&order=<?php echo $asc_or_desc; ?>">Tel. nr.</a></th>
                    <th><a class="customLink" href="<?php echo addOrUpdateUrlParam() ?>&column=rezervacijos_diena&order=<?php echo $asc_or_desc; ?>">Diena</a></th>
                    <th><a class="customLink" href="<?php echo addOrUpdateUrlParam() ?>&column=rezervacijos_laikas&order=<?php echo $asc_or_desc; ?>">Laikas</a></th>
                    <th><a class="customLink" href="<?php echo addOrUpdateUrlParam() ?>&column=apsilankymas&order=<?php echo $asc_or_desc; ?>">Apsilankymo Nr.</a></th>
                    <th><a class="customLink" href="<?php echo addOrUpdateUrlParam() ?>&column=kurejo_id&order=<?php echo $asc_or_desc; ?>">Rezervavęs asmuo</a></th>
                    
                    <?php //if($session->ifAdmin()){ ?>
                    <th>Ištrinti</th>
                    <?php //}?>
                </tr>
                </thead>
                <tbody>
        
            <?php 
            $limit = 20; //reik mainstreamint
            if(isset($_GET['search_submit']) && $_GET['data'] != ""){
                $search = $_GET['data'];
            }elseif(isset($_GET['search_submit'])){
                $search = $_GET['search'];
            }else{
                $search = "";
            }
            
            $rezervacijos = Rezervacija::findBySearch($search);
            $page_number = pageNr($rezervacijos, $limit);
            $query_count = queryCount($rezervacijos, $limit);
            $rezervacijos = Rezervacija::findBySearchLimited($search, $page_number, $limit, $column, $sort_order);
             
            foreach ($rezervacijos as $irasas) { 
                $rezervavo = User::kasRezervavo($irasas->kurejo_id);               
                echo "<tr>";
                echo "<td>{$irasas->vardas}</td>";
                echo "<td>{$irasas->pavarde}</td>";
                echo "<td>{$irasas->email}</td>";
                echo "<td>{$irasas->phone}</td>";
                echo "<td style='min-width:90px'>{$irasas->rezervacijos_diena}</td>";
                echo "<td>{$irasas->rezervacijos_laikas}</td>";
                echo "<td>{$irasas->apsilankymas} " . Rezervacija::arDuotiNuolaidą($irasas->apsilankymas) . "</td>";
                echo "<td>$rezervavo</td>";
                echo "<td>";
                if($session->ifAdmin() || $_SESSION['id'] == $irasas->kurejo_id){
                    echo "<a onClick=\"javascript: return confirm('Ar tikrai norite ištrinti?'); \" class='text-danger' href='includes/delete_rezervacija.php?id=" . $irasas->id ."'>Ištrinti<a>";
                }
                echo "</td>";    
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
                    echo "'><a href='";
                    echo addOrUpdateUrlParam();
                    echo "&page=$i'>$i</a></li>";
                }
            } 
            
        ?>
        </ul>
        <!-- Pagination end -->  
    </div>
</div>
<!-- /.row -->