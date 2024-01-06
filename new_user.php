<?php
include("config.php");


if(@$_POST['submit']){
	$name=$_POST['name'];
	$contact=$_POST['contact'];
	$user=$_POST['username'];
	$pass=$_POST['password'];
   
    $image_name=rand(100,10000).$_FILES['image']['name'];
    $path=$_FILES['image']['tmp_name'];
    move_uploaded_file($path, "images/$image_name");
    $qry="insert into admin values(null,'$name','$contact','$user','$pass','images/$image_name')";
    $res=mysqli_query($con,$qry);
    if($res)
    {
    	echo "your data is successully inserted..";
    	header("location:index.php");
    }
  
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Admin</title>
</head>
<body>
<center>
<form method="post" enctype="multipart/form-data"> <table border="1" width="500">
<tr> <th colspan="2"><h2>Add Admin</h2></th>
</tr>
<tr> <td> Enter Name </td><td> <input type="text" name="name"> </td></tr>
<tr> <td> Enter Contact </td><td> <input type="text" name="contact"> </td></tr>
<tr> <td> Enter UserName </td><td> <input type="text" name="username"> </td></tr>
<tr> <td> Enter Password </td><td> <input type="password" name="password"> </td></tr>
<tr> <td> Select Image </td><td> <input type="file" name="image">
 </td></tr>
<tr> <td></td><td> <input type="submit" name="submit"> </td></tr>
</table></form>

</body>
</html>