<?php
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


$profile_pic = $_REQUEST['profile_pic'];
$user_name = $_REQUEST['user_name'];
$user_password = $_REQUEST['user_password'];
$confirm_password = $_REQUEST['confirm_password'];
$user_email = $_REQUEST['user_email'];
$user_description = $_REQUEST['description'];
$user_img = $_REQUEST['user_name'];


// Use == operator
if ($user_password == $confirm_password) {


  $sql = "INSERT INTO users (user_name, user_password, user_email, description, profile_photo )
  VALUES ('$user_name', '$user_password', '$user_email ','$user_description', '$profile_pic');";

}
else {
    echo 'wrong password are not same';
}




if (mysqli_multi_query($conn, $sql)) {


  header("Location: Login.html");


} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>