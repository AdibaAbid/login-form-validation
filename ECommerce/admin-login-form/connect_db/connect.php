<?php

trait database{
    public $con;
    public function db_connect(){
        $con= mysqli_connect('localhost','root','','e_commerce');
        if(mysqli_connect_error()){
            echo 'not connected';
        
        }else{
            //  echo 'True connected';
             return $con;
        }
    }
}
class dbconfig{
    use database;
}

// $obj = new dbconfig();
// $obj->db_connect();
?>