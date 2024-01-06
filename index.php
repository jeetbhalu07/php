<?php
include("config.php");

if(@$_SESSION['admin']!=null){
	header("location:dashboard.php");
}





if(@$_POST['submit']){
	$user=$_POST['username'];
	$pass=$_POST['pass'];

	$qry="select * from admin where username='$user' and pass='$pass'";
	$res=mysqli_query($con,$qry);
	$cnt=mysqli_num_rows($res);
	if($cnt==1)
	{
			$ar=mysqli_fetch_assoc($res);
			$id=$ar['id'];
		$_SESSION['admin']=$id;
		header("location:dashboard.php");
	}else
	{
		echo "invalid username and pass";
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
</head>
<body>
<center>
<form method="post"> <table border="1" width="500">
<tr> <th colspan="2"><h2>Login Page</h2></th>
</tr>
<tr> <td> Enter UserName </td><td> <input type="text" name="username"> </td></tr>
<tr> <td> Enter Password </td><td> <input type="password" name="pass"> </td></tr>
<tr> <td></td><td> <input type="submit" name="submit"> </td></tr>
</table></form>
<h3><a href="new_user.php">New Admin</a></h3>
</body>
</html>