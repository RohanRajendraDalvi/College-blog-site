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

<body class="d-flex flex-column flex-grow-1 flex-shrink-1 flex-fill align-items-center align-content-center" style="width: 100%;height: 100%;margin: 3px;padding: 3px;background: rgb(255,255,255);">
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
        <div class="col">
            <h1 class="text-center">College Blog</h1>
            <h5 class="text-center" style="color: rgb(255,255,255);background: #000000;">A blogsite by students&nbsp;</h5>
            <div class="row">
                <div class="col">
                    <header></header>
                </div>
            </div>
        </div>
    </div>

<?php

$fetchpost= " SELECT * FROM posts"; 
$postcheck = mysqli_query($conn, $fetchpost);

while($row=  mysqli_fetch_array($postcheck)){

    $fetchuser =" SELECT * FROM users WHERE user_id = '".$row['user_id'] ."'; ";
    
    $userckeck=mysqli_query($conn,$fetchuser);
    while($rowu=  mysqli_fetch_array($userckeck))
    {

        $user_img= $rowu['profile_photo'];
        $nameofuser=$rowu['user_name'];


    }



    ?>



    <div class="container d-flex flex-row-reverse" >
        <div  class="row d-flex flex-row-reverse" style="border-color: rgba(255,255,255,0.05);box-shadow: 0px 0px 10px, 0px 0px; 
        bottom-margin: 20px;">
            <div class="col-md-6 d-flex flex-column">
                <header></header>
                <h6 class="text-start" style="margin: 10%;"><?=$row['content']; ?></h6>
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-xl-start" style="box-shadow: 0px 0px;">
                <h4 class="d-flex justify-content-start align-items-center" style="margin: 3%;margin-left: 0;margin-top: 3%;margin-bottom: 0;"><img src=" <?=$user_img ?>" style="width: 30px;height: 30px;border-radius: 50%;border-width: 4px;border-style: double;margin: 2%;"><?=$nameofuser ?></h4><img class="d-flex flex-column align-items-xl-end" style="width: 80%;height: 80%;margin: 10%;margin-top: 0;margin-bottom: 0;" src="<?=$row['post_image']; ?>">
                <h4 class="d-flex" style="margin-top: 2%;"><?=$row['title']; ?></h4>
                <h6 class="d-flex"><?=$row['description']; ?></h6>
            </div>
            <div class="col">
                <header></header>
            </div>
            <div class="col-md-6 d-flex">



            <form     action="response.php " methord="post">
                <input   type="hidden"  name="post_id" value="<?=$row['post_id']; ?>" >


            <button class="btn btn-primary" style="background: rgba(13,110,253,0);color: rgb(0,0,0);border-color: rgba(0,0,0,0.04);box-shadow: 0px 0px 7px;margin-bottom: 10px;" name="like" type="submit" value="1">Like<i class="fa fa-thumbs-o-up"></i></button>
            </form>
            
            
            <form     action="response2.php " methord="post">
                <input   type="hidden"  name="post_id" value="<?=$row['post_id']; ?>" >

            <button class="btn btn-primary"style="background: rgba(13,110,253,0);color: rgb(0,0,0);border-color: rgba(0,0,0,0.06);box-shadow: 0px 0px 4px;margin-left: 5px;margin-bottom: 10px;" name="Dislike" type="submit"  value="1">Dislike<i class="fa fa-thumbs-o-down" ></i></button>
            </form>




                <h6 class="d-flex" style="margin: 2%;box-shadow: 0px 0px 8px;margin-bottom: 15px; padding-left: 10px; padding-right:10px;"><?=$row['response']; ?></h6>


            </div>
        </div>
    </div>


<?php
    

}


?>











    
    <div class="container" style="margin: 3%;">
        
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
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Ludens---Sleek-Image-Input-with-Preview.js"></script>
</body>

</html>


<?php 

} 

?>
