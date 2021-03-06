<?php 
if(isset($_POST['create'])){
    $user = new User();
    if($user){
        $user->username = $_POST['username'];
        $user->firstName = $_POST['firstName'];
        $user->lastName = $_POST['lastName'];
        $user->password = $_POST['password'];
        $user->pareigos = $_POST['pareigos'];
    }
    $user->create();
}
?>


<div class="row">
    <div class="col-lg-6">
        <h2 class="page-header">
            Visi darbuotojai
        </h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Vartotojo vardas</th>
                    <th>Vardas</th>
                    <th>Pavardė</th>
                    <th>Pareigos</th>                    
                    <?php if($session->ifAdmin()){  ?>
                    <th>Redaguoti</th>
                    <th>Ištrinti</th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
        
        <?php 
            $darbuotojai = User::find_all();
            foreach ($darbuotojai as $darbuotojas) {
                echo "<tr>";
                echo "<td>{$darbuotojas->username}</td>";
                echo "<td>{$darbuotojas->firstName}</td>";
                echo "<td>{$darbuotojas->lastName}</td>";
                echo "<td>{$darbuotojas->pareigos}</td>";
                if($session->ifAdmin()){
                    echo "<td><a href='?url=redaguoti_darbuotoja&id=" . $darbuotojas->id . "'>Redaguoti</a></td>";
                    echo "<td><a onClick=\"javascript: return confirm('Ar tikrai norite ištrinti?'); \" class='text-danger' href='includes/delete_user.php?id=" . $darbuotojas->id ."'>Ištrinti<a></td>";
                    echo "</tr>";
                }                            
            }
        ?>
                </tbody>
            </table>   
        </div>    
    </div>


    <?php if($session->ifAdmin()){  ?>  
    <div class="col-lg-6">
        <h2 class="page-header">
            Pridėti darbuotoją            
        </h2>
        <form action="" method="post" enctype="multipart/form-data">                                     
            <div class="col-md-6"> 
                <div class="form-group">
                    <label for="username">Prisijungimo vardas</label>
                    <input name="username" class="form-control" type="text" placeholder="Įveskite prisijungimo vardą"> 
                </div>
                <div class="form-group">
                    <label for="firstName">Vardas</label>
                    <input name="firstName" class="form-control" type="text" placeholder="Įveskite vardą"> 
                </div>
                <div class="form-group">
                    <label for="lastName">Pavardė</label>
                    <input name="lastName" class="form-control" type="text" placeholder="Įveskite Pavardę"> 
                </div>
                <div class="form-group">
                    <label for="password">Slaptažodis</label>
                    <input name="password" class="form-control" type="password" placeholder="Įveskite prisijungimo slaptažodį"> 
                </div>
                <div class="form-group">
                <label for="pareigos">Pareigos</label>
                <select class="form-control" name="pareigos" id="">
                <option value="kirpeja">Kirpėja</option>
                <option value="admin">Admin</option>
                </select>
                </div>
                <div class="form-group">
                    <input name="create" class="btn btn-primary pull-right" type="submit" value="Sukurti"> 
                </div>            
            </div>                                                 
        </form>
    </div>
    <?php } ?>
</div>
<!-- /.row -->
