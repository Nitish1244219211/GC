<?php
session_start();
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']){
  require "R.php";
}else{
$showAlert = false;
$showError = false;
$exists = false;
function pbg($data) {
  $data = trim($data);//trim extra space
  $data = stripslashes($data);//trim slashes bagera
  return $data;
}
function rep($data){
  $data = htmlspecialchars($data);//replace <,> 2 &lt,&rt
  return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
$sbt = $_POST["sbt"];
  include 'dbconnect.php';
$sbt = $_POST["sbt"];
    $username = rep(pbg($_POST["username"]));
    $password = pbg($_POST["password"]);
    $cpassword = pbg($_POST["cpassword"]);
    $sql = "SELECT username  FROM `users` WHERE `username` = '$username'";
    //$rs=mysqli_query($conn,$sql);
    $rs=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($rs);
    //if($row&&$rs)
    if($row)
     {
      $exists = true;
     }
    elseif($password != $cpassword){
        $showError = "Hey! Seems like passwords didn't match.";
    }
    if(($password == $cpassword) && $exists==false)
    {
        $hash = password_hash($password,PASSWORD_BCRYPT);
        $sql = "INSERT INTO `users` ( `username`, `password`) VALUES ('$username', '$hash')";
        $result = mysqli_query($conn, $sql);
        if ($result)
        {
            $showAlert = true;
        }
    }
  
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
    <link href= "report.css" rel= "stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- nk java -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>SignUp</title>
  </head>
  <body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- nk java -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <?php require 'nav.php' ?>

     <!--<form action="signup.php" method="post">-->
          <!-- <form action="/" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
            <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
        </div>
         
        <button type="submit" class="btn btn-primary"required>SignUp</button>
     </form>-->
    <div class= "container my-4">
      <main class= "container">
  <br>
    <div class= "vertical-center">
            <!--Forms........form-->
    <form action="index.php"  method="post">
  <div class="col-md-12">
    <label for="Email" class="form-label"><strong>Username</strong></label>
    <input type="email" class="form-control" name= "username"id="email" aria-describedby="emailHelp" placeholder = "Enter your Email ID" maxlength = '50'required>
    <div id="emailHelp" class="form-text">Enter your email id as Username 4 ur convenience</div>
  </div>
  <div class="col-md-12">
    <label for="Password" class="form-label"><strong>Password</strong></label>
    <input type="password" class="form-control" name= "password"id="password" placeholder= 'Enter the Password' required>
  <div id="emailHelp" class="form-text">Enter a really strong password to secure ur account</div>
  </div>
      <div class="col-md-12">
    <label for="CPassword" class="form-label"><strong>Confirm Password</strong></label>
    <input type="password" class="form-control" name= "cpassword"id="cpassword" placeholder= 'Confirm your Password' required>
  <div id="emailHelp" class="form-text">Re-enter the same password entered above</div>
      </div>
  </div>
      <br>
  <!-- nk
      checkbox haa

      <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
    -->

    <div class= "container">
<button type="submit" value="sbt" class="btn btn-primary col-md-12" name= "sbt">Signup</button>
    </div><br>
      <div class = "form-text container" align = "center">
        Already have an account? 
        <a href= "login.php" style= "text-decoration:none">
         Login
        </a>
      </div>
</form>
  </div>
</main>
    </div>
    <br>
    <?php
if(isset($sbt)){
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show container" id= "alert-success" role="alert">
  <strong>Success!</strong>You have Successfully Signed up :)
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show container" id= "alert-info" role="alert">
  <strong>Oh!</strong>'.$showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
      if(isset($exists)&&($exists==true)){
$exists=false;
        include "dpusralert.php";
}              }
  
  include "footer.php";
    ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    </body>
</html>
