<?php // IDEA:
   require_once('config/db.class.php');

 class User
 {

     public $userId, $userName, $email, $password;
     public function __construct($u_name, $u_email, $u_pass)
     {
         $this->userName = $u_name;
         $this->email = $u_email;
         $this->password = $u_pass;
     }
     public function save(){
       $db=new Db();
       $sql = "INSERT INTO users (userName, email, password) VALUES
       (
         '".mysqli_real_escape_string($db->connect(),$this->userName)."'
         ,'".mysqli_real_escape_string($db->connect(),$this->email)."'
         ,'".mysqli_real_escape_string($db->connect(),$this->password)."'
      ) ";
       $result = $db->query_excute($sql);
       return $result;
     }
     public static function checkLogin($userName,$password){
       $password=md5($password);
       $db=new Db();
       $sql="SELECT * FROM users WHERE userName='$userName' AND password='$password'";
       $result = $db->query_excute($sql);
       return $result;
     }
}
?>
