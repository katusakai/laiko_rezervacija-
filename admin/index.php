<?php include("includes/header.php"); ?>
<?php  !$session->is_signed_in() ? redirect("login.php") : false  //if not signed in- redirects  ?>


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
  <?php 
  if(isset($_GET['url'])){
    switch ($_GET['url']) {
      case 'rezervacija':
        include("includes/admin_content.php");
        break;
      case 'darbuotojai':
        include("includes/darbuotojai.php");
        break;
      case 'prideti_darbuotoja':
        include("includes/prideti_darbuotoja.php");
        break;
      case 'redaguoti_darbuotoja':
        if($_GET['id'] == $session->id){
          include("includes/redaguoti_darbuotoja.php");          
        } elseif($session->ifAdmin()){
          include("includes/redaguoti_darbuotoja.php");
        } else{
          include("includes/darbuotojai.php");
      }
        break;
      
      default:
      include("includes/admin_content.php") ;
        break;
    }

  } else {
    include("includes/admin_content.php") ;
  }
    ?>
  </div>
</div>
<!-- /#page-wrapper -->


  <?php include("includes/footer.php"); ?>
