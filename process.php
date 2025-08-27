<?php
session_start();
if(isset($_POST['submit'])){
if(isset($_POST['reciever']) && !empty($_POST['reciever'])){
    $_SESSION['reciever'] = $_POST['reciever'];
    header("location: chat.php");                                                     
    exit;
echo $_POST['reciever'];
echo $_SESSION['reciever'];}else{
echo"pgl";
    //some error handling or redirecting code
}
}else{echo"<script>
    window.location = 'welcome.php';
</script>  ";  }
?>
