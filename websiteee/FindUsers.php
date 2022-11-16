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


if(isset($_SESSION["email_id"])){  
    // header("location:login.php");  


$sql= " SELECT * FROM users WHERE user_email= '".$_SESSION['email_id']."' ";

$check= mysqli_query($conn,$sql );  

$row=  mysqli_fetch_array($check);
    


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Index</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Drag--Drop-Upload-Form.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/LinkedIn-like-Profile-Box.css">
    <link rel="stylesheet" href="assets/css/Ludens---Sleek-Image-Input-with-Preview.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/Search-Field-With-Icon.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="container">
    <nav class="navbar navbar-light navbar-expand-md">
            <div class="container-fluid"><a class="navbar-brand" href="index.php">College Blogsite</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav">
                        <li class="nav-item"></li>
                        <li class="nav-item"><a class="nav-link" href="FindUsers.php">Find Bloggers</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>
                        <li class="nav-item"><a class="nav-link" href="Login.html">Sign in</a></li>
                    </ul>
                    <div class="col">

                      
                        <a href="Profile.php" style=" text-decoration: none ; color:black"><h5 class="text-end d-flex flex-row justify-content-end align-items-center align-content-end align-self-end order-last">
                            <?=$_SESSION['email_id'];?>
                            <img  src="


                             <?=$row['profile_photo']; ?> 
                             
                             
                             " style="width: 30px;height: 30px;border-radius: 50%;border-width: 4px;border-style: double;margin: 2%;">  </h5></a>




                    </div>
                </div>
            </div>
        </nav>

        <div class="search-container" style="box-shadow: 0px 0px 4px;"><button class="btn btn-light search-btn" type="button"> <i class="fa fa-search"></i></button><input type="text" class="search-input" name="search-bar" placeholder="Search..."></div>
<div class="row" >
        <?php


        $allp= "SELECT * FROM users" ;
        $allpp= mysqli_query($conn,$allp);
        $ppp=  mysqli_fetch_array($allpp);
        $numrow= mysqli_num_rows($allpp);
      //  $result = mysqli_query($conn, $sql);
      while ($row=  mysqli_fetch_array($allpp)) {
                            
             
          

        ?>  
             
        <div class="col d-flex container ">


            <div  class="text-center border rounded-0 shadow-sm profile-box" style="width: 200px; height: 300px;background-color: #ffffff;margin: 5px;
    word-wrap: break-word; ">
                <div style="height: 50px;background-image: url(&quot;assets/img/bg-pattern.png&quot;);background-color: rgba(54,162,177,0);"></div>
                <div><img class="rounded-circle" src="<?=$row['profile_photo'];?>" width="60px" height="60px" style="background-color: rgb(255,255,255);padding: 2px;"></div>
                <div style="height: 80px;">
                    <h4 class=""><?=$row['user_email'];?></h4>
                    <p style="font-size: 12px;"><?=$row['description'];?></p>
                </div>


            </div>

        </div>
        <?php } ?>
      </div>
      <footer class="footer-clean" style="width: 100%;margin: 3%;margin-top: 0;margin-bottom: 0;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-3 item">
                    <h3>College Id</h3>
                    <ul>
                        <li><a href="https://www.tcetmumbai.in/">College Web Site</a></li>
                        <li><a href="profile.html">upload Blog</a></li>
                        <li><a href="http://erp.tcetmumbai.in/">ERP</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 item">
                    <h3>About</h3>
                    <ul>
                        <li><a href="https://www.instagram.com/rationalist_rohan/">Me</a></li>

                    </ul>
                </div>
                <div class="col-lg-3 item social"><a href="https://www.facebook.com/tri.max.904"><i class="icon ion-social-facebook"></i></a><a href="https://twitter.com/RDXMumbai"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="https://www.instagram.com/rationalist_rohan/"><i class="icon ion-social-instagram"></i></a>
                    <p class="copyright">CollegeBlogsite© 2021</p>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Ludens---Sleek-Image-Input-with-Preview.js"></script>
</body>

</html>
<?php 

} 

?>
