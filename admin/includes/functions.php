<?php

function classAutoLoader($class){     //includes classes auto
  $class = strtolower($class);
  $the_path = "includes/{$class}.php";

  if(file_exists($the_path)){
    require_once($the_path);
  } else{
    die("This file name {$class}.php was not found");
  }
}
spl_autoload_register('classAutoLoader');


function redirect($location){
  header("Location: {$location}");
}

function ifSelected($option){                //selects needed option in <select>
  global $user;
  if($user->pareigos == $option ){
  echo "selected";
  }
}

function postValue($value){                          //does not let drop value for <input> after failed POST method
    if(isset($_POST[$value])){
        echo "value='" . $_POST[$value] . "'";
    }
    if(isset($_GET[$value])){
      echo "value='" . $_GET[$value] . "'";
  }
}



function postOptionSelected($post_value, $db_value){                      //does not let drop selection for <option> after failed POST method
  if(isset($_POST[$post_value]) && $db_value  == $_POST[$post_value]){
      echo "selected";
  }
}

function queryCount($array,$limit){                  //counts how many queries there are
  $count = count($array);
  $count = ceil($count / $limit);
  return $count;
}

function pageNr($array, $limit){                      //for pagination 

  if(isset($_GET['page'])){
    $page =  $_GET['page'];
  } else {
    $page = "";
  }

  if($page =="" || $page ==1){
    $page_1 = 0;
  } else {
    $page_1 = ($page * $limit) - $limit;
  }
return $page_1;  
}

// function ifSearch(){                          //for pagination
//   global $search;
//   if(isset($_GET['search_submit'])){
//     echo "search=$search&search_submit=&";
//   }
// }


function ifActive(){                        //for pagination
  global $i;
  if(isset($_GET['page'])){
    $number = $_GET['page'];
  } else {
    $number = 1;
  } 
  if($number == $i){
    echo "active";
  } elseif(!isset($_GET['page']) && $number == $i) {
    echo "active";
  }
}

function addOrUpdateUrlParam(){                                //returns current URL. Usefull when stacking GET links
    $params = $_GET;    
    return basename($_SERVER['PHP_SELF']).'?'.http_build_query($params);
}


  #############   Variables required for sorting################
$columns = array('rezervacijos_diena','pavarde','email','phone','vardas','rezervacijos_laikas','apsilankymas');
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'asc' ? 'ASC' : 'DESC';
$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
// $add_class = ' class="highlight"';

########################################################################
 ?>
