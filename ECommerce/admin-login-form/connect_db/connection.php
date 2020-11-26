<?php

// class database {
//     private $host;
//     private $user;
//     private $password;
//     private $db_name;
//     public $con;
//     public $error;

//     function __construct(){
//         $this->host= "localhost";
//         $this->user= "root";
//         $this->password= "";
//         $this->db_name= "e_commerce";
//         $this->connect();
//     }
    
//     function connect(){
//         global $con;
//     $this->con= mysqli_connect($this->host, $this->user,  $this->password, $this->db_name);
//     if(mysqli_connect_error()){
//         die('not connected');
//     }else{
//         echo 'connected';
//     }
//   }
include('connect_db/connect.php');
$obj = new dbconfig();
$obj->db_connect();


class UserValidator extends dbconfig{
    public $condition;

 public function required_validation($fields){
      $count = 0;
      foreach($fields as $key=> $value){
          if(empty($value)){
              $count++;
              $this->error = "<p>" . $key . " is required </p>";
          }
      } if($count == 0){
          return true;
      }
  }

  public function login($table_name, $where_condition){
      
    if($where_condition!=""){
        $condition.="";
        $c = count($where_condition);
        $i=1;
        foreach($where_condition as $key => $value){
            if($i==$c){
                $condition.= "admin_".$key ."=". $value;
            }
            else{
                $condition.= "admin_".$key ."=". $value. " and ";
            }
            $i++;
    }  

    $query = "SELECT * FROM admin_login WHERE $condition";
 
    $result = mysqli_query($con, $query); 
    // if($result == 1){
    //       echo 'login successfull';
    // }else{
    //       echo 'not successfull';
    // }
    // //   echo 'result---->'. mysqli_num_rows($result) ."<br/>";
      echo 'query---->'.$query ."<br/>";

      if(mysqli_num_rows($result)==1)  
      {  
          echo 'login successfull';
          return true;  
      }  
      else  
      {  
           $this->error = "Wrong Data";  
      }  
  }

}
}
 


    // class dbconfig 
    // {

    // public  $connection;
    //     public function __construct()
    //     {
    //         $this->db_connect();
    //     }
       
    //     public function db_connect()
    //     {
    //         $connection = mysqli_connect('localhost','root','','e_commerce');
    //         if(mysqli_connect_error())
    //         {
    //             die(" Connect Failed ");
    //         }
    //         else{
    //             echo "connection successful";
    //         }
    //     }

       
    // }

?>