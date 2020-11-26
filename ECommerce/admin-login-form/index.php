<?php

require('user-validator.php');

if(isset($_POST['submit'])){
    //validate the entries
    $validation = new UserValidator($_POST); 
    $y = $validation->db_connect();
    $errors = $validation->validateForm($y);  
   
}

// include 'connect_db/connection.php';  

//  $data = new UserValidator;  
//     $message = '';  

//     if(isset($_POST["submit"]))  
//     {  
//       $field = array(  
//            'username' => $_POST["username"],  
//            'password' => $_POST["password"]  
//       );  
//       if($data->required_validation($field))  
//       {  
//         $y = $data->db_connect();

//            if($data->login("admin_login", $field))  
//            {  
//               echo 'Login hogyaaa';
//            }  
//            else  
//            {  
//                 $message = $data->error;  
//            }  
//       }  
//       else  
//       {  
//            $message = $data->error;  
//       }  
//  }  


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form With OOP</title>
</head>

<body>
    <div class="new-user">
        <h2>Create new user</h2>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <label>Username:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? "") ?> ">
            <div class="error">
                <?php
                echo $errors['username'] ?? ''
                ?>
            </div>

            <label>Password:</label>
            <input type="password" name="password" value="<?php echo htmlspecialchars($_POST['password'] ?? "") ?>">
            <div class="error">
                <?php
                echo $errors['password'] ?? ''
                ?>
            </div>

            <input type="submit" value="submit" name="submit">

        </form>
    </div>
</body>
<!-- Script tags -->
<script src="js/sweetalert.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</html>