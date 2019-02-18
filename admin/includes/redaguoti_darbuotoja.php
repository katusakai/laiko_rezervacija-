
<?php 
$user = User::find_by_id($_GET['id']);
if(isset($_POST['redaguoti'])){    
    if($user){
        $user->username = $_POST['username'];
        $user->firstName = $_POST['firstName'];
        $user->lastName = $_POST['lastName'];
        if(!empty($_POST['password'])){
            $user->password = $_POST['password'];
        }        
        if(!empty($_POST['pareigos'])){
            $user->pareigos = $_POST['pareigos'];
        }
    }
    $user->update();
}
?>


<div class="row">
      <div class="col-lg-6">
        <h2 class="page-header">
            Redaguoti profilį            
        </h2>
        <form action="" method="post" enctype="multipart/form-data">                                     
            <div class="col-md-6"> 
                <div class="form-group">
                    <label for="username">Username</label>
                    <input name="username" class="form-control" type="text" value="<?php echo $user->username ?>"> 
                </div>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input name="firstName" class="form-control" type="text" value="<?php echo $user->firstName ?>"> 
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input name="lastName" class="form-control" type="text" value="<?php echo $user->lastName ?>"> 
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" class="form-control" type="password" placeholder="Įveskite naują slaptažodį, jei norite jį pakeisti"> 
                </div>
                <?php if($session->ifAdmin()){ ?>
                <div class="form-group">
                    <label for="pareigos">Pareigos</label>
                    <select class="form-control" name="pareigos" id="">
                        <option <?php $user->ifSelected('kirpeja') ?> value="kirpeja">Kirpėja</option>
                        <option <?php $user->ifSelected('admin') ?> value="admin">Admin</option>
                    </select>
                </div>
                <?php  } ?>
                <div class="form-group">
                    <input name="redaguoti" class="btn btn-primary pull-right" type="submit" value="Redaguoti"> 
                </div>            
            </div>                                                 
        </form>
    </div>
</div>
<!-- /.row -->
