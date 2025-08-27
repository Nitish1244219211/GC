<?php
session_start(); // start a session

// Establish a connection to the database
$conn = mysqli_connect('127.0.0.1', 'root', '', 'morphed_rage');
// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Get the message, sender, and receiver from the form
/*if(isset($_POST['message'])&&isset($_POST['sender'])&&isset($_POST['reciever']))
{*/
$message = $_POST['message'];
$sender = $_POST['sender'];
$receiver = $_POST['receiver'];
/*}
else{
echo"<script>

window.location = 'chat.php';
</script>";
exit;
}*/
//Validate that the message is within a certain length
if (strlen($message) > 10000) {
    $status2 ="Error: Message must be less than 1000 characters.";
}

//Validate that the recipient's username exists in the database
$check_user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$receiver'");
if (mysqli_num_rows($check_user) == 0) {
    $status3= "Error: The recipient's username does not exist.";
}

//Validate that the sender and the receiver are not the same person
if ($sender == $receiver) {
    $status4= "Error: You cannot send a message to yourself.";
}

//Remove any JavaScript code from the message
//$message = filter_var($message, FILTER_SANITIZE_STRING);
$message=htmlspecialchars(stripslashes($message));

//Validate that the message, sender, and receiver fields are not >
if (empty($message) || empty($sender) || empty($receiver)) {
    $status1= "Error: Please fill out all fields.";
echo"<script>                                                         window.location = 'chat.php';
</script>";}
else{
// Insert the message into the database
$sql = "INSERT INTO messages (sender, receiver, message) VALUES ('$sender', '$receiver', '$message')";
if (mysqli_query($conn, $sql)) {
    $status5= "Message sent successfully";
} else {
    $status6= "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
// Close the connection

mysqli_close($conn)
?><script>
    window.location = 'chat.php';
</script>

