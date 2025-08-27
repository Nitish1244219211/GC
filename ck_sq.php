<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
  $loggedin= true;
}
else
{
  $loggedin = false;
}
$showAlert = false;
$pass= false;
$showError = false;
$exists = false;
//$sqexists= true;
function pbg($data) {
  $data = trim($data);//trim extra space
  //$data = stripslashes($data);//trim slashes bagera
  $data= strtoupper($data);
  return $data;
}
function rep($data){
  $data = htmlspecialchars($data);//replace <,> 2 &lt,&rt
  return $data;
}
if(isset($sbt)){}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
  if(!$loggedin)
  {
    $username = rep(pbg($_POST["username"]));
    $_SESSION['username']=$username;
  }
  else
    {
      $username = $_SESSION['username'];
    }
  {
    $nickname = pbg($_POST["nickname"]);
    $father_first_name = pbg($_POST["father's_first_name"]);
    $best_friend = pbg($_POST["best_friend"]);
    $fst_school = pbg($_POST["1st_school"]);
    $fav_color = pbg($_POST["fav_color"]);
    $fav_fruit = pbg($_POST["fav_fruit"]);
    $fav_sweet = pbg($_POST["fav_sweet"]);
    $stage_name = pbg($_POST["stage_name"]);
    $country = pbg($_POST["country"]);
    $pin_code = pbg($_POST["pin_code"]);



     }

  //ck dt of sq form in dtb

  $sql = "SELECT *  FROM `Security_Q` WHERE `username` = '$username' AND `nickname` = '$nickname' AND `best_friend` = '$best_friend' AND `father's_first_name` ='$father_first_name' AND `1st_school` ='$fst_school' AND `fav_color` = '$fav_color' AND `fav_fruit` = '$fav_fruit' AND `fav_sweet` = '$fav_sweet' AND `stage_name` = '$stage_name' AND `pin_code` = '$pin_code' AND `country` = '$country'";
  $rs=mysqli_query($conn,$sql);

  //ck alert
  
  if(mysqli_fetch_assoc($rs))
  {
 header("location: reset_pwd.php");
  $pass=true;
  $_SESSION['pass']=$pass;
  exit;

    }
  else
  {
    $showError = " Seems like u have mistakenly entered wrong details.";
  }

}
?>
<!doctype html>
<html lang="en">
 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- nk css -->
    <link href= "nav.css" rel= "stylesheet">
    <link href= "get_sq_form.css" rel= "stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- nk java -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Reset Password</title>
  </head>
  <body style=""  >
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- nk java -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <?php require 'nav.php'; ?>
    <?php
    if($showAlert){
    $_SESSION['showAlert'] = $showAlert;
    echo ' <div class="alert alert-success alert-dismissible fade show container col-md-12" id= "alert-success" role="alert">
  <strong>Success!</strong> Ur SQ is set now. :)
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
include "R.php";
exit;}
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show container my-4 col-md-12" id= "alert-info" role="alert">
  <strong>Oh!</strong>'.$showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
      ?>
<div class= "container my-4" >

<h3 style="text-align:center; border-radius:80px; background-color: #F5F7FA;">
<b>SQ Form</b>
</h3></div>
<div class="container-fluid>" style="padding:8px;">
<h6  style="text-align:center; border-radius:10px; background-color: #F5F7FA;">
<strong>Note: </strong><em>Enter the details you had entered in SQ form last time (if any).</h6></em>
</h6>
  </div>
 
<div class="container-fluid" id= "sq">
   <div class= "container my-4" style= "background-color: #F5F7FA; border-radius:40px; opacity:.83;">
            <!--Forms........form-->
    <form action="ck_sq.php"  method="post" style= "padding:30px;" class= "">
  <?php
  if(!$loggedin)
  {
   echo'<div class="col-md-12">
    <label class="form-label"><strong>USERNAME</strong></label>
    <input type="email" class="form-control" name="username"  id="username"   aria-describedby="emailHelp" placeholder = "Enter your Username" maxlength = "50" required>
       </div><hr>';
  }
    ?>
    <!--<div id="emailHelp" class="form-text"><b>Note: </b>Your Email ID is your Username.</div>
  -->

      <div class="col-md-12">
    <label class="form-label"><strong>WHAT IS YOUR NICKNAME?</strong></label>
    <input type="text" class="form-control" name="nickname"  id="nickname"   aria-describedby="emailHelp" placeholder = "Enter your Nickname" maxlength = '50' required>
    
    <!--<div id="emailHelp" class="form-text"><b>Note: </b>Your Email ID is your Username.</div>
  -->
      </div>

<hr>

      <div class="col-md-12 container-fluid">
    <label class="form-label"><strong>WHAT IS YOUR FATHER'S FIRST NAME?</strong></label>
    <input type="text" class="form-control" name="father's_first_name"  id="father's_first_name"   aria-describedby="emailHelp" placeholder = "Enter your Father's First Name" maxlength = '50' required>
    
    <!--<div id="emailHelp" class="form-text"><b>Note: </b>Your Email ID is your Username.</div>
  -->
      </div>

      <hr>

      <div class="col-md-12">
    <label class="form-label"><strong>NAME ANY FRIEND YOU CALL TO BE YOUR BESTIE.</strong></label>
    <input type="text" class="form-control" name="best_friend"  id="best_friend"   aria-describedby="emailHelp" placeholder = "Enter the name of your Bestie" maxlength = '50' required>
    
    <!--<div id="emailHelp" class="form-text"><b>Note: </b>Your Email ID is your Username.</div>
  -->
      </div>

      <hr>
      
      <div class="col-md-12">
    <label class="form-label"><strong>NAME OF YOUR FIRST SCHOOL.</strong></label>
    <input type="text" class="form-control" name="1st_school"  id="1st_school"   aria-describedby="emailHelp" placeholder = "Enter the name of your first school" maxlength = '50' required>
    
    <!--<div id="emailHelp" class="form-text"><b>Note: </b>Your Email ID is your Username.</div>
  -->
  </div>

      <hr>
      
      <div class="col-md-12">
    <label class="form-label"><strong>WHAT IS YOUR FAVOURITE COLOR?</strong></label>
    <input type="text" class="form-control" name="fav_color"  id="fav_color"   aria-describedby="emailHelp" placeholder = "Enter name of your favorite color" maxlength = '50' required>
    
    <!--<div id="emailHelp" class="form-text"><b>Note: </b>Your Email ID is your Username.</div>
  -->
      </div>

      <hr>
      
      <div class="col-md-12">
    <label class="form-label"><strong>WHAT IS YOUR FAVORITE FRUIT?</strong></label>
    <input type="text" class="form-control" name="fav_fruit"  id="fav_fruit"   aria-describedby="emailHelp" placeholder = "Enter name of your favorite fruit" maxlength = '50' required>
    
    <!--<div id="emailHelp" class="form-text"><b>Note: </b>Your Email ID is your Username.</div>
  -->
      </div>

      <hr>
      
      <div class="col-md-12">
    <label class="form-label"><strong>WHAT IS YOUR FAVOURITE SWEET?</strong></label>
    <input type="text" class="form-control" name="fav_sweet"  id="fav_sweet"   aria-describedby="emailHelp" placeholder = "Enter name of your favorite sweet" maxlength = '50' required>
    
    <!--<div id="emailHelp" class="form-text"><b>Note: </b>Your Email ID is your Username.</div>
  -->
      </div>

      <hr>
      
      <div class="col-md-12">
    <label class="form-label"><strong>ANY STAGE-NAME YOU LIKE/WOULD LIKE TO GIVE TO YOURSELF.</strong></label>
    <input type="text" class="form-control" name="stage_name"  id="stage_name"   aria-describedby="emailHelp" placeholder = "Enter any Stage Name for yourself" maxlength = '50' required>
    
    <!--<div id="emailHelp" class="form-text"><b>Note: </b>Your Email ID is your Username.</div>
  -->
      </div>

      <hr>
      
      <div class="col-md-12">
    <label class="form-label"><strong>WHAT IS THE NAME OF YOUR COUNTRY?</strong></label>
    <input type="text" class="form-control" name="country"  id="country"   aria-describedby="emailHelp" placeholder = "Enter your Country's Name" maxlength = '50' required>
    
    <!--<div id="emailHelp" class="form-text"><b>Note: </b>Your Email ID is your Username.</div>
  -->
      </div>

      <hr>
      
      <div class="col-md-12">
    <label class="form-label"><strong>WHAT IS YOUR AREA'S PIN-CODE?</strong></label>
    <input type="tel" class="form-control" name="pin_code"  id="pin_code"   aria-describedby="emailHelp" placeholder = "Enter your Area's Pin code" maxlength = '7' required>
    
    <!--<div id="emailHelp" class="form-text"><b>Note: </b>Your Email ID is your Username.</div>
  -->
      </div>
<br>
    

      <div class="col-md-12">
    <input type="submit" class="btn btn-primary col-md-12" name="sbt"  id="sbt"   aria-describedby="emailHelp"  required>

    <!--<div id="emailHelp" class="form-text"><b>Note: </b>Your Email ID is your Username.</div>
  -->
      </div>
      <br>
      <div>
    <?php 
    if(!$loggedin){echo"<a style= 'text-decoration:none' href= 'login.php'>Back</a>";}
      
      else{echo"<div class= 'form-text container' align= 'right' id='fgt'>
    <a style='text-decoration: none' href='reset_pwd.php'>Try another method</a>
      </div>";}
      ?>
      </div>
    </form>
</div>  
    
<br>
<br>  </body>
</html>

 
