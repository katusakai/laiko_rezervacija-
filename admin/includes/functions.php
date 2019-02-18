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
}

function postOptionSelected($post_value, $db_value){                      //does not let drop selection for <option> after failed POST method
  if(isset($_POST[$post_value]) && $db_value  == $_POST[$post_value]){
      echo "selected";
  }
}

 ?>
