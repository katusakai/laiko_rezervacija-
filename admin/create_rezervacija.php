<?php include("includes/header.php"); ?>
<?php  !$session->is_signed_in() ? redirect("login.php") : false  //if not signed in- redirects  ?>
<?php 
$zinute = "";
$diena = diena();
function diena(){
	if(isset($_GET['submit_data'])){
		return $_GET['data'];
	} else {
		return date('Y-m-d');
	}
}
?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <?php include("includes/top_nav.php") ?>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <?php include("includes/side_nav.php") ?>
    <!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">
  <div class="container-fluid">
            <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">
                    Rezervuoti laiką
                </h2>
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
                    $rezervacija->kurejo_id = $_SESSION['id'];
                    if($zinute == ""){
                        if($rezervacija->create()){
                            echo "<div class='alert alert-success'>Rezervacija sėkmingai atlikta</div>";
                           // redirect("create_rezervacija.php");
                        }              
                        
                    //  echo "<div class='alert alert-success'>Jūs sėkmingai užsiregistravote</div>";
                    } else {
                        echo "<div class='alert alert-warning'>" . $zinute . "</div>";
                    }
                }
                ?>

                <?php 
                if(isset($_GET['submit_data'])){
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
            </div>
        </div>  

    </div>
</div>
<!-- /#page-wrapper -->


  <?php include("includes/footer.php"); ?>
