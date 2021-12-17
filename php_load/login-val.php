<?php
include("../inc/session.inc.php");
include("../inc/db.inc.php");
$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);
$login = strip_tags($_POST['login']);
$date = date('Y-m-d');
$time = date('h:i A');

if (isset($login)) {
	$email = $_POST["email"];
	$password = preg_replace('#[^A-Za-z0-9]#i', "", $_POST["password"]); //filter everything but letters and numbers
	$password_md5 = md5($password);
	$sql = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password_md5' AND removed='no' LIMIT 1"); //query
	//Check for their existence
	$userCount = mysqli_num_rows($sql); //count the number of rows returned
	// echo $userCount;
	if ($userCount === 1) {
		$row = mysqli_fetch_assoc($sql);
		$login_user = $row["username"];
		//echo $user;
		$_SESSION["login_user"] = $login_user;
		//echo $_SESSION['login_email'];
		exit();
	} else {
		echo "<p class='text-danger'><span class='ion-alert'></span> Your username or password is incorrect! Try again!</p>";
	}
}
?>