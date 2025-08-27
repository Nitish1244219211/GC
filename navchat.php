<?php 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
}
else{
  $loggedin = false;
}
echo'<nav class="navbar navbar-light fixed-top" style="background-color: #353541;">
  <div class="container-fluid">
<a href="welcome.php" role="button" class="btn btn-outline-danger"
        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
  Back
</a>    <a class="navbar-brand" href="https://www.gcdhaliara.in/"><strong class= "navbar-brand" style="color: white;">GC Dhaliara</strong></a>';
if($loggedin){
  $username = $_SESSION['username'];
  $conn = mysqli_connect('127.0.0.1', 'root', '', 'morphed_rage');
$sql = "SELECT * FROM `profile` WHERE username ='$username'";
$res= mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($res);
  if(!empty($row['profile_pic'])){
  $dpicname= $row['profile_pic'];//  abc.jpg

  $path= 'upload/'.$dpicname;//  upload/abc.jpg
  $pic= "'$path'";// 'upload/abc.jpg'
}else {  $pic= 'upload/default.png';
      }
echo"<button class='btn' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasWithBothOptions' aria-controls='offcanvasWithBothOptions' aria-expanded='false' aria-label='Toggle navigation'>";
if(isset($pic)){
  echo"<img src = $pic class = 'profile_pic' alt= 'profile_pic'>";
}
}      echo'<span class="navbar-toggler-icon"></span>
      </button>
    </div>
    </div>
</nav>
  <br>
  <br>
  
  
  <div class="offcanvas bg-light offcanvas-start offcanvas-container " data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <br>
  <br>
  <br>
  <div class="offcanvas-header flex">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Back</h5>
    <button type="button" class="btn-close ccbtn" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    
  </div>
  <hr class="hr hr-dark">
  <div class = "offcanvas-body  " aria-orientation="vertical">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="welcome.php"><span>Home</span></a>
        </li>';
if(!$loggedin)
{
   echo'<li class="nav-item">
          <a class="nav-link" href="index.php"><span>Signup</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="login.php"><span>Login</span></a>
        </li>';
}

if($loggedin)
{
  echo '<li class="nav-item">
          <a class="nav-link" href="profile.php"><span>Profile</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="logout.php"><span>Logout</span></a>
        </li>

<li class="nav-item">
                                             
          <a class="nav-link" href="reset_pwd.php"><span>Reset</span></a>
         </li>';
}

echo'
   <!--
        dropdown menu 3 da haa

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Signup</a></li>
            <li><a class="dropdown-item" href="#">Login</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul>
        -->
  </ul>
    </div>
    </div>
  </div>
</div>';
  ?>
