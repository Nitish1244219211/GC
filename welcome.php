<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
//if($_SESSION['loggedin']!=true){
  header("location: login.php");
    exit;
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
    <link href= "welcome.css" rel= "stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- nk java -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Welcome - <?php echo $_SESSION['username']; ?></title>
    </head>
  <body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- nk java -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <?php require 'nav.php' ?>
<br>
<?php 
$username= $_SESSION['username'];
if(isset($_SESSION['showAlert'])&&($_SESSION['showAlert']))
{
echo ' <div class="alert alert-success alert-dismissible fade show container col-md-12" id= "alert-success" role="alert">
 <strong>Success!</strong> Ur SQ is set now. :)
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
$_SESSION['showAlert']=false;
}
$conn = mysqli_connect('127.0.0.1', 'root', '', 'morphed_rage');
  $sql = "SELECT * FROM `Security_Q` WHERE username ='$username'";
    $rs= mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($rs);
    if(!$row)
    {
    echo '<div class="container"><div class="alert alert-info container" role="alert">
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  <h1><b>Great!</b></h1>
<ul>  
  <li>Just one step and u r good to go.</li>
  <li>Keeping the security of the users under consideration we would like to take some of your details.</li>
  <li>Without this u might <i>not</i> be able to <i>reset</i> ur <i>Password</i> without contacting to Help Desk.</li>
  <li>
    Click on <a style="text-decoration:none" href="set_sq.php"><b>Increase Security</b></a>
  </li>
</ul>
    </div></div>';
    }
      ?>

    <!--All people-->
<div class= " container"><span class= "scard">
<div class="row row-cols-1 row-cols-md-2 g-4">
<?php
$conn = mysqli_connect('127.0.0.1', 'root', '', 'morphed_rage');
$username = $_SESSION['username'];
$pplsrch = "SELECT username FROM users WHERE username != '$username'";
$ppl = mysqli_query($conn, $pplsrch);

while($eachppl = mysqli_fetch_assoc($ppl)) {
  $reciever = $eachppl['username'];
  $profiledt = "SELECT * FROM `profile` WHERE username ='$reciever'";
  $profiledtrs= mysqli_query($conn, $profiledt);
  if($profiledtrs){
    $eachprodt=mysqli_fetch_assoc($profiledtrs);
    $proreciever= true;
    if(!empty($eachprodt['first name'])||!empty($eachprodt['last name'])){
      $rfname= $eachprodt['first name'];
      $rlname= $eachprodt['last name'];
      $name= $rfname.' '.$rlname;}
    else{
      $name= $reciever;
            }

if(isset($eachprodt['bio'])&&!empty($eachprodt['bio'])){
$bio=$eachprodt['bio'];}
else{$bio=NULL;}
    if(!empty($eachprodt['profile_pic'])){
      $rpicname= $eachprodt['profile_pic'];//  reciever.jpg
      $rpath= 'upload/'.$rpicname;//  upload/reciever.jpg
      $rpic= "'$rpath'";// 'upload/reciever.jpg'
    }else {  
      $rpic= 'upload/default.png';
    }
  }
  else{
    $proreciever= false;
    $name= $reciever;
    $rpic= 'upload/default.png';
  }
    // do something with each row
echo"<div class='col'>
<div class='card'>
<form action='process.php' method='post'>
  <input type='hidden' name='reciever' value= $reciever>
<label>  <img class='card-img-top'  alt = 'pplpic' src=$rpic>
<input type = 'submit' class= 'hidden-submit' style='display:none' name= 'submit'>
<div class='card-body'>
        <h5 class='card-title'>$name</h5>
        <p class='card-text'>$bio</p>
      </div>
    </div>
 </label>
</form></div>";
}

?>
    </span>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>

