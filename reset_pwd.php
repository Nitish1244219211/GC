<?php
session_start();
if(!isset($_SESSION['loggedin']) && $_SESSION['pass']){
$username = $_SESSION['username'];
$loggedin = false;
$pass=true; }
elseif($_SESSION['loggedin'] && !isset($_SESSION['pass'])){
  $loggedin= true;
  $pass=false;}
elseif($_SESSION['loggedin'] && $_SESSION['pass']){
  $loggedin= true;
  $pass=true;}
$karochange=false;
$reset = false;
$showError = false;
$error = false;
function pbg($data) {
  $data = trim($data);
  return $data;
}
function rep($data){
  $data = htmlspecialchars($data);//replace <,> 2 &lt,&rt
  return $data;
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'dbconnect.php';
      $username = $_SESSION['username'];
if($loggedin && !$pass)
{
  $opassword = pbg($_POST["opassword"]);
}
    $password = pbg($_POST["password"]);
    $cpassword = pbg($_POST["cpassword"]);
if($password != $cpassword){
        $showError = "Hey! Seems like passwords didn't match.";
    }
elseif(($password == $cpassword) && isset($username))
    {
    if($loggedin && !$pass)   {
        $sql = "Select * from users where username='$username'";
        $result = mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);
    if ($row)
     { 
       $match=password_verify($opassword,$row['password']);
       if ($match)
       {
         $karochange= true;
       }
       else
      {
        $showError="You have entered wrong password.";
      }
     }
      }
    
      if($karochange||$pass)
        {
          $hash = password_hash($password,PASSWORD_BCRYPT);
         
          $sql = "UPDATE `users` SET `password` = '$hash' WHERE `users`.`username` ='$username'";
          $result = mysqli_query($conn,$sql);
         if($result)
          {
            $reset=true;
            $_SESSION['pass']= false;
          }
          else
          {
            $error=true;
          }
        }
     }
 $close=mysqli_close($conn);
}

else
{
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- nk java -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Reset Password</title>
  </head>
  <body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- nk java -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <?php require 'nav.php' ?>
    
<!--
    <div class="container my-4">
     <h1 class="text-center">Login to our website</h1>
     <form action="login.php" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
       
         
        <button type="submit" class="btn btn-primary">Login</button>
     </form>
    </div>
-->
  <div class="container my-4">


    <main>
    <div class= "container">
            <!--Forms........form-->
    <form action="reset_pwd.php"  method="post">
  <!--<div class="col-md-12">
    <label for="Email" class="form-label"><strong>Username</strong></label>
    <input type="email" class="form-control" name= "username"id="email" aria-describedby="emailHelp" placeholder = "Enter your Username"required>
    <div id="emailHelp" class="form-text"><b>Note: </b>Your Email ID is your Username.</div>
  </div>--><?php 
 if($loggedin &&isset($pass)&& !$pass){
    echo'<div class="col-md-12">
    <label for="OldPassword" class="form-label"><strong>Old Password</strong></label>
    <input type="password" class="form-control" name= "opassword"id="opassword" placeholder= "Enter your Old Password" required>
  <div id="emailHelp" class="form-text"><b>Note: </b> Never share your Password with anyone. </div>
      </div>';
}
  ?>
  
  <div class="col-md-12">
    <label for="Password" class="form-label"><strong>Password</strong></label>
    <input type="password" class="form-control" name= "password"id="password" placeholder= "Enter your New Password" required>
  <div id="emailHelp" class="form-text"><b>Note: </b> Never share your Password with anyone. </div>
  </div>
      <br>
<div class="col-md-12">
    <label for="Password" class="form-label"><strong>Confirm Password</strong></label>
    <input type="password" class="form-control" name= "cpassword"id="cpassword" placeholder= "Confirm your Password" required>
  <div class="form-text"><b>Note: </b> Never share your Password with anyone. </div>
  </div>
      <br>
  </div>
  <!--
      checkbox haa

      <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
      -->
    <div class= "form-text container" align= "right" id="fgt">
    <a style="text-decoration: none" href="ck_sq.php">Try another method</a>
    </div>
      
    <div class= "container">
      <br>
<input type="submit" class="btn btn-primary container" value= "Reset" name= "sbt" required>
      </div>
      <br>
      <!--<div class = "form-text container" align = "center">
        Didn't have an account?
          Create one
        <a href= "index.php" style= "text-decoration:none">
         <strong>Signup</strong>
        </a>
    </div>-->
</form>
        
  
</main>
      <?php
    if($reset){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your Password has been updated :)
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
$reset=false;
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
 
$showError=false;   }
    if($error){
    echo '<div class="alert alert-info alert-dismissible fade show container" id= "alert-info" role="alert">
  <strong>Oh! Damn , </strong> Something went wrong :(
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
$error=false;}
?> 
  </body>
</html>
