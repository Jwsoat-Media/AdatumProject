<?php
require "sql.php";
if(isset($_POST['uname']) and isset($_POST['pwd'])){
    $user= mysqli_real_escape_string($conn,$_POST['username']) ;
    $pass = mysqli_real_escape_string($conn,$_POST['password']) ;
    $sql = "SELECT password FROM members WHERE username = '$user'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
while($row = mysqli_fetch_array($result)){
$hash = $row['password'];
if(password_verify($pass, $hash)){
        session_start();
        $_SESSION['user'] = "$user";
}
else {
	echo "Wrong Password!";
	header('Location: login.php');
}
}
}



?>