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

$post_id = $_REQUEST['post_id'];



    $likeSql=  "UPDATE posts SET response=response-1 WHERE post_id=$post_id" ;

    $likeq= mysqli_query($conn, $likeSql);
if($likeq){
echo 'response success';}
else{
    echo 'response failed';}
 header("Location: index.php");


mysqli_close($conn);

?>
