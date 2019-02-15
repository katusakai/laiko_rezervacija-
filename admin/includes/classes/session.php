<?php
class Session {
  private $signed_in = false;
  public $id;
  public $username;
  public $firstName;
  public $lastName;
  public $message;
  public $pareigos;


  function __construct(){
    session_start();
    $this->chech_the_login();
    $this->check_message();
  }

  public function message($msg=""){
    if(!empty($msg)){
      $_SESSION['message'] = $msg;
    } else {
      return $this->message;
    }
  }

  private function check_message(){
    if(isset($_SESSION['message'])){
      $this->message = $_SESSION['message'];
      unset($_SESSION['message']);
    } else {
      $this->message = "";
    }
  }

  public function is_signed_in(){
    return $this->signed_in;
  }

  public function ifAdmin(){
    if($this->pareigos == "admin"){
      return true;
    }else {
      return false;
    }
    
  }  

  public function login($user){
    if($user) {
      $this->id = $_SESSION['id'] = $user->id;
      $this->username = $_SESSION['username'] = $user->username;
      $this->firstName = $_SESSION['firstName'] = $user->firstName;
      $this->lastName = $_SESSION['lastName'] = $user->lastName;
      $this->pareigos = $_SESSION['pareigos'] = $user->pareigos;
      $this->signed_in = true;
    }
  }

  public function logout(){
    unset($_SESSION['id']);
    unset($this->id);
    $this->signed_in = false;

  }

  private function chech_the_login(){
    if(isset($_SESSION['id'])){
      $this->id = $_SESSION['id'];
      $this->signed_in = true;
    } else {
      unset($this->id);
      $this->signed_in = false;
    }
  }

}

$session = new Session();


 ?>
