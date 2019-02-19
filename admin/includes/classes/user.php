<?php
class User extends Db_object{

  protected static $db_table = "users";
  protected static $db_table_fields = array('username', 'password', 'firstName', 'lastName', 'pareigos');
  public $id;
  public $username;
  public $password;
  public $firstName;
  public $lastName;
  public $pareigos; //admin arba kirpeja


  public static function verify_user($username, $password){
    global $database;
    $username = $database->escape_string($username);
    $password = $database->escape_string($password);

    $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
    $sql .= "username = '{$username}' ";
    $sql .= "AND 	password = '{$password}' ";
    $sql .= "LIMIT 1 ";

    $the_result_array = self::find_by_query($sql);
    return !empty($the_result_array) ? array_shift($the_result_array) : false;
  }

  public static function darbuotojuKiekis($pareigos){
    $result = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE 	pareigos = '{$pareigos}'");
    return count($result);
  }

  public function ifSelected($option){    
    if($this->pareigos == $option ){
    echo "selected";
    }
  }

  public static function kasRezervavo($id){
    if($id == 0 || $id == ""){
      return "Klientas";
    } else{
      $sql = "SELECT * FROM " . static::$db_table . " 
              WHERE id = $id 
              LIMIT 1";
      $rezervuotojas = static::find_by_query($sql);        
      return $rezervuotojas[0]->firstName . " " . $rezervuotojas[0]->lastName;
    }
  }
}
?>
