<?php 
session_start();
if(!isset($_SESSION['loggedin'])&&!$_SESSION['loggedin']){
  require "R.php";
  exit;
}
$sender = $_SESSION['username'];
$reciever = $_SESSION['reciever'];
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- nk java -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Chat Room</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href= "nav.css" rel= "stylesheet"> 
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- nk java -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<div class="header">    <?php require 'navchat.php' ?>
</div>
       <div class="chat-messages" style="height: 80vh; overflow: auto;">
            <?php  
                // Establish a connection to the database
                $conn = mysqli_connect('127.0.0.1', 'root', '', 'morphed_rage');

                // Check if the connection was successful
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Get the messages from the database
               $sql = "SELECT * FROM messages WHERE (sender = '$sender' AND receiver = '$reciever') OR (sender = '$reciever' AND receiver = '$sender')  ORDER BY timestamp ASC";  
              $result = mysqli_query($conn, $sql);

                // Display the messages
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                    $msender= $row['sender'];
                       $profiledt = "SELECT * FROM `profile` WHERE username ='$msender'";
  $profiledtrs= mysqli_query($conn, $profiledt);
  //if($profiledtrs){
    $eachprodt=mysqli_fetch_assoc($profiledtrs);
  if($eachprodt){
    //$promsender= true;
    if(!empty($eachprodt['first name'])||!empty($eachprodt['last name'])){
      $mfname= $eachprodt['first name'];
      $mlname= $eachprodt['last name'];
      $name= $mfname.' '.$mlname;}
    else{
      $name= $msender;
            }
    if(!empty($eachprodt['profile_pic'])){
      $rdpicname= $eachprodt['profile_pic'];//  abc.jpg
      $rdpath= 'upload/'.$rdpicname;//  upload/abc.jpg
      $rdpic= $rdpath;// 'upload/abc.jpg'
    }else {  
      $rpic= "upload/default.png";
      $rdpic="upload/default.png";
    }
  }
  else{
   // $prosender= false;
    $name= $msender;
$rdpic="upload/default.png";
    $rpic= "upload/default.png";
  }
if($msender==$_SESSION['username']){
$mpic=$pic;}
else{$mpic=$rdpic;
}

echo"<div class='container-fluid' style='padding:5px;'>
 <div class='row'>
  <div class='col-1 text-center'>
   <img src= $mpic class='img-fluid rounded-circle' style='width: 50px; height: 50px;'>
 </div>
  <div class='col-11'>
  <div class='card'>
    <div class='card-body'>
 <div class='name'> ".$name."</div> <p class='card-text'>".$row['message']."</p>
    <p class='text-muted' style='font-size: small;'> <span class='float-right'>".$row['timestamp']."</span> </p>
    </div>
 </div>
   </div>
</div>
</div>";
}
echo"<div class ='container'style='height:10px;' id='last'></div>";

          } 
                // Close the connection
                mysqli_close($conn);
            ?>

        </div>
</div>
<div class="container-fluid fixed-bottom" id="form">
  <div class="row" id ="inform">
    <div class="col-sm-12">
      <form action="submit_message.php" method="post">
        <div class="form-group row">
          <div class="col-sm-1">
            <img src=<?php echo $pic; ?> style='border-radius:5px;' class="img-fluid">
          </div>
          <div class="col-sm-11 d-flex align-items-start">                             
           <textarea class="form-control flex-grow-1" name="message" id="message" rows="3" maxlength="50000" style="resize:none; overflow-y:auto;" oninput="auto_grow(this, 250)"></textarea>
<div class="align-self-center">
<input type="hidden" name="sender" value=<?php echo $_SESSION['username']; ?>>
                <input type="hidden" name="receiver" value=<?php echo $_SESSION['reciever'];?>>
                        <button type="submit" class="btn btn-primary btn-sm ml-1">Send</button>
</div>          </div>
        </div>
      </form>
    </div>                                                                                                                                                                         </div>                                                                                                                                                                         </div>
<script>
function auto_grow(element, maxHeight) {
    element.style.height = "5px";
    if (element.scrollHeight > maxHeight) {
        element.style.height = maxHeight + "px";
        element.style.overflowY = "scroll";
    } else {
        element.style.height = (element.scrollHeight)+"px";
        element.style.overflowY = "hidden";
    }
}
</script>
<script>
  window.onload = function() {
    var element = document.getElementById("last");
    element.scrollIntoView();
  }
</script>
</body>
</html>
