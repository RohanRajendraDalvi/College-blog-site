<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blogsite";

session_start();
if(isset($_SESSION["email_id"])){  }
    // header("location:login.php");  


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$blog_title = $_REQUEST['blog_title'];
$blog_content=$_REQUEST['blog_content'];
$blog_description = $_REQUEST['blog_description'];
$blog_img = $_REQUEST['blog_img'];

$fetch= "SELECT user_id FROM users WHERE user_email = '". $_SESSION["email_id"]."';  ";

$result = mysqli_query($conn, $fetch);
while ($row=  mysqli_fetch_array($result)) {    
        echo $row['user_id'];                
        $uid=$row['user_id'];
    }

$insertp= "INSERT INTO posts (user_id, title, description, content, post_image) VALUES ( '$uid', '$blog_title' ,'$blog_description', '$blog_content' , '$blog_img'  )";

if(mysqli_multi_query($conn, $insertp)){
echo "<script>alert('blogsuccess')</script>";
header("Location: index.php");

// mysqli_close($conn);}
}
else{
    echo "<script>alert('err')</script>";
}
?>