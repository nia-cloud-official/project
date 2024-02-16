<?php 
session_start();
    $DB_CONNECTION = "db.php";
    require($DB_CONNECTION);
     $email = $_POST['email'];
     $password = $_POST['password'];

    $query =  "SELECT * FROM `users` WHERE `email` = '$email'";
                         // fetching data from database
     $result = $conn->query($query);
                          if ($result->num_rows > 0 ) 
                          {
                             $_SESSION['email'] = $email;
                             header("Location: ./dashboad.php");
                             error_reporting(10);
                          }else{ 
                            header("Location: login.php");
                            error_reporting(10);
                          }
                        ?>