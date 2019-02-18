<?php include("../admin/includes/init.php"); ?>

<?php 
if(empty($_GET['id'])){
  redirect("../index.php");
}
$rezervacija = Rezervacija::find_by_id($_GET['id']);
$cookie = new Cookie;
if($rezervacija){
  $rezervacija->delete();
  $cookie->panaikintiRezervacija();
  redirect("../index.php");
} else {
	redirect("../index.php");
}
?>