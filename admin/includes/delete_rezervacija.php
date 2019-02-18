<?php include("init.php"); ?>
<?php  !$session->is_signed_in() ? redirect("../login.php") : false  //if not signed in- redirects  ?>

<?php 
if(empty($_GET['id'])){
  redirect("../index.php?url=rezervacija");
}
$rezervacija = Rezervacija::find_by_id($_GET['id']);
if($rezervacija){
  $rezervacija->delete();
  redirect("../index.php?url=rezervacija");
}

?>