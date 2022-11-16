<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blogsite";



// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}



$user_password = $_REQUEST['user_password'];

$user_email = $_REQUEST['user_email'];


$query="SELECT * FROM users WHERE user_email = '".$user_email ."' AND user_password = '". $user_password."'  limit 1" ;

$check= mysqli_query($conn, $query);  

		    $numrows=mysqli_num_rows($check); 


			if($numrows==1){  
        session_start();
        $_SESSION['email_id']=$user_email;

                echo "<script>alert('login success')</script>";
                
               header("location: Index.php");
}else {

   echo "<script>alert('login failed')</script>";
}

// $row = mysqli_query($query,$conn);

// if (mysqli_num_rows($row)==1)
// {

//   echo "you have succefully logged in";
// }
// else
// {
//     echo "incorrect pass";

// }


// // Use == operator
// if ($user_password == $confirm_password) {


//   $sql = "INSERT INTO users (user_name, user_password, user_email, description, profile_photo )
//   VALUES ('$user_name', '$user_password', '$user_email ','$user_description', '$profile_pic');";

// }
// else {
//     echo 'wrong password are not equal';
// }



// echo "incorrect pass";
// if (mysqli_multi_query($conn, $query)) {
//   echo "logged in successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

mysqli_close($conn);
?>