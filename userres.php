<?php
$con = mysqli_connect('localhost','root','');
mysql_select_db('test');
if($con)
{
	echo 'connected';
}
else
{
	echo 'not connected';
}
if($_POST['register'])
{
	//To check whether email already exists
	$email = $_POST['email'];
	$query = "select * from user where email='$email'";
	$get = mysql_query($query,$con);
	$no_of_rows = mysql_num_rows($get);
	var_dump($query);
	if($no_of_rows > 0)
	{
	echo "The email address already exists";
	exit;		
	} 
	if(!empty($_POST['username'])) $name = $_POST['username'];
	if(!empty($_POST['password'])) $password = $_POST['password'];
	if(!empty($_POST['email'])) $email = $_POST['email'];
	if(!empty($_POST['mobile'])) $mobile = $_POST['mobile'];
	if(!empty($_POST['address'])) $address = $_POST['address'];
	$query = "INSERT INTO `user`(`id`, `name`, `password`, `email`, `mobile`, `address`) VALUES ('',$name,$password,$email,$mobile,$address)";
	mysql_query($query,$con);
	echo 'The values inserted successfully';
}
?>
<form action="" method="post">
Username :<input type="text" name="username" required> <br />
Password :<input type="text" name="password" required> <br />
E-mail   :<input type="email" name="email" required> <br />
Mobile No :<input type="text" name="mobile" required> <br />
Address :<textarea name="address"></textarea> <br />
		<input type="submit" name="register" Value="Register" > 
</form>