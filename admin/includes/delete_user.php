<?php include("init.php"); ?>
<?php  !$session->is_signed_in() ? redirect("../login.php") : false  //if not signed in- redirects  ?>

<?php 
if(empty($_GET['id'])){
  redirect("../index.php?url=darbuotojai");
}
$user = User::find_by_id($_GET['id']);
if($user){
  $user->delete();
  redirect("../index.php?url=darbuotojai");
}

?>