<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
//if($_SESSION['loggedin']!=true){
  header("location: login.php");
    exit;
}
$username = $_SESSION['username'];
$conn = mysqli_connect('127.0.0.1', 'root', '', 'morphed_rage');
$sql = "SELECT * FROM `profile` WHERE username ='$username'";
$res= mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($res);

if(!empty($row)){
  $user= true;
  $dfname= $row['first name'];
  $dlname= $row['last name'];
if(!empty($row['profile_pic'])){
  $dpicname= $row['profile_pic'];//  abc.jpg

  $path= 'upload/'.$dpicname;//  upload/abc.jpg
  $pic= "'$path'";// 'upload/abc.jpg'
}else {  $pic= 'upload/default.png';
}
}
else{
  $user= false;
  $pic= 'upload/default.png';
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $fname = $_POST["firstname"];
    $lname = $_POST['lastname'];
    $file = $_FILES['profile_pic'];
    $file_name = $file['name'];
    if(!empty($file_name)){
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_ext = explode('.', $file_name);
    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    $file_error = $file['error'];
    $file_ext = strtolower(end($file_ext));
    if(in_array($file_ext, $allowed)){
        if($file_error === 0){
          $error = false;
            if(($file_size <= 2097152) && ($file_size >= 1024)){
                $size= true;
                $file_name_new = $username.'.'.$file_ext;
                $file_destination = 'upload/'.$file_name_new;
            }else{
                
                $mes1=  "File size too large. Maximum 2MB allowed.";
            }
        }else{$error = true;
            $mes2=  "There was an error uploading your file. Please try again.".$file_error;
        }
    }else{
        $mes3=  "Invalid file type. Only jpg, jpeg and png allowed.";
    }
  }
  else{$mes6 = "no file selected";}
  if($user){if(($fname!= $dfname)||($lname!= $dlname)||(!empty($file_name)&&!$error)){
                $sql = "UPDATE profile SET";
                if($fname!= $dfname) {
                 $sql .= " `first name`='$fname',";
                }
                if($lname!= $dlname) {
                 $sql .= " `last name`='$lname',";
                }
                if(!empty($file_name)){
                 $sql .= " profile_pic='$file_name_new',";
                }
                $sql = rtrim($sql, ",");
                $sql .= " WHERE username ='$username'";
                $rs= mysqli_query($conn, $sql);
                if($rs&&!empty($file_name)){
                  if(!empty($row['profile_pic'])){
                    unlink('upload/'.$row['profile_pic']);
                  //unlink('upload/'.$username);
                  }
                  move_uploaded_file($file_tmp, $file_destination);
                }
  }if(isset($rs)&&$rs){
                $mes4= "Profile updated successfully!";
    }
    else{$mes5= "error on rs";
          }  
               } else{if(!empty($fname)||!empty($lname)||(!empty($file_name)&&!$error)){

                //$sql = "INSERT INTO profile (username,`first name`,`last name`, profile_pic) VALUES ('$username','$fname','$lname','$file_name_new')";
                $sql = "INSERT INTO profile (username , ";
              
if(!empty($fname)){
  $sql.= "`first name`,";}
  if(!empty($lname)){
  $sql.= "`last name`,";}
  if(!empty($file_name)){
  $sql.= "profile_pic,";}
    $sql= rtrim($sql,",");
  $sql.= ") VALUES ('$username',";
  if(!empty($fname)){
  $sql.= " '$fname',";}
    if(!empty($lname)){
  $sql.= " '$lname',";}                
    if(!empty($file_name)){
  $sql.= " '$file_name_new',";}
      $sql= rtrim($sql,",");
  $sql.= ")";
                $rs= mysqli_query($conn, $sql);
                if($rs&&!empty($file_name)){move_uploaded_file($file_tmp, $file_destination);
          }
  }if(isset($rs)&&$rs){
                $mes4= "Profile updated successfully!";
    }
    else{$mes5= "error on rs";
          }  
                     }
                      header("location: profile.php");
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
    <link href= "profile.css" rel= "stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- nk java -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Profile</title>
  </head>
  <body class= "body">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- nk java -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <?php require 'nav.php' ?>
<section class= "container">
  <?php if(isset($mes1)){echo $mes1.'<br>';}if(isset($mes2)){echo $mes2.'<br>';}if(isset($mes3)){echo $mes3.'<br>';}if(isset($mes4)){echo $mes4.'<br>';}if(isset($mes5)){echo $mes5.'<br>';}if(isset($mes6)){echo $mes6.'<br>';}?>
  <div class = "profile">
  <h4><b>Profile</b></h4>
  </div>
  
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="profile_pic">
        <input type="file" class="form-control-file" accept="image/*" id="profile_pic" name="profile_pic" style= "display:none;">
        <img alt = "profile_pic" class= "img" src= <?php echo $pic; ?> >
        </label>
        </div>
      
      <div class="form-group">
        <div class= "name">
          
        <div>
        <label for="first name"><small>First name</small></label>
        <input type="text" class="form-control" id="first name" name="firstname" value= <?php if($user){echo $dfname;}?>>
        </div>
          
        <div>
        <label for="last name"><small>Last name</small></label>
        <input type="text" class="form-control" id="last name" name="lastname" value= <?php if($user){echo $dlname;}?>>
        </div>
          
        </div>
     </div>
  <button type="submit" class="btn btn-primary btn-sm" style= "--bs-btn-border-radius: .5rem;" name="submit">Save</button>
</form>
  </body>
      </html>
