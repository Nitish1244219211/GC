$sql = "SELECT username  FROM `users` WHERE `username` = '$username'";
//$rs=mysqli_query($conn,$sql);
$rs=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($rs);
//if($row&&$rs)
if($row)
{
  $exists = true;
}