<?php
session_start();
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']){
  require "R.php";
  exit;
}
$login = false;
$showError = false;
$nousr = false;
function pbg($data) {
  $data = trim($data);//trim extra space
  $data = stripslashes($data);//trim slashes bagera
  return $data;
}
function rep($data){
  $data = htmlspecialchars($data);//replace <,> 2 &lt,&rt
  return $data;
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    require 'dbconnect.php';
    $username = rep(pbg($_POST["username"]));
    $password = pbg($_POST["password"]); 
    
     
    $sql = "Select * from users where username='$username'";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $num = mysqli_num_rows($result);
    //if ($num == 1){
    if ($row)
     { 
       $match=password_verify($password,$row['password']);
       if ($match)
        {
          
                  $login = true;
//                  session_start();
                  $_SESSION['loggedin'] = true;
                  $_SESSION['username'] = $username;
                  header("location: welcome.php");
        }
           else
                {
                $showError = "Invalid Credentials p";
                }
     }
      else
     {
       $nousr= true;
     }
                
}
else
{
//$showError = "Invalid Credentials n"; 
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

    <title>Login</title>
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
  <br>
  <div class= "container">
            <!--Forms........form-->
    <form action="login.php"  method="post">
  <div class="col-md-12">
    <label for="Email" class="form-label"><strong>Username</strong></label>
    <input type="email" class="form-control" name= "username"id="email" aria-describedby="emailHelp" placeholder = "Enter your Username" maxlength = '50'required>
    <div id="emailHelp" class="form-text"><b>Note: </b>Your Email ID is your Username.</div>
  </div>
  <div class="col-md-12">
    <label for="Password" class="form-label"><strong>Password</strong></label>
    <input type="password" class="form-control" name= "password"id="password" placeholder= "Enter your Password" required>
  <div id="emailHelp" class="form-text"><b>Note: </b> Never share your Password with anyone. </div>
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
    <a style="text-decoration: none" href="ck_sq.php">Forgot password?</a>
    </div>
      
    <div class= "container">
      <br>
<button type="submit" class="btn btn-primary container" name= "sbt">Login</button>
      </div>
      <br>
      <div class = "form-text container" align = "center">
        Didn't have an account?
          Create one 
        <a href= "index.php" style= "text-decoration:none">
         Signup
        </a>
      </div>
</form>
        

</main>
      <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($nousr){
    echo '<div class="alert alert-info alert-dismissible fade show container" id= "alert-info" role="alert">
  <strong>Oh! Damn , </strong> Are u sure u signed up...
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';}
    ?>
      <!-- <?php
if($_SERVER['REQUEST_METHOD']=='POST')
{include "Lgetusrdt.php";}
 ?>
  -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  </body>
</html>
