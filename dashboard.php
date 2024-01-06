<?php
include("config.php");

if(@$_SESSION['admin']!=null)
{
$id=$_SESSION['admin'];
$qry1="select * from admin where id=$id";
$res1=mysqli_query($con,$qry1);
$ar1=mysqli_fetch_assoc($res1);

}else
{
	header("location:index.php");
}

$qry="select * from admin";
$res=mysqli_query($con,$qry);

if(@$_GET['id']){
	$id=$_GET['id'];
	$qry1="delete from admin where id=$id";
	$res1=mysqli_query($con,$qry1);
	unlink($_GET['image']);

	if($res1){
		echo "your recored is successfully deleted...";
		header("location:dashboard.php");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
</head>
<body>
<h1>Welcome to  <?php echo $ar1['name'];?></h1>
<h2> <a href="logout.php">Logout</a></h2>

<table width="500" border="1">
	<tr><th>Id </th><th>name</th><th>contact</th><th>image</th><td>Action</td></tr>
<?php
while($arr=mysqli_fetch_assoc($res)){?>
<tr><td><?php echo $arr['id'];?></td>
<td><?php echo $arr['name'];?></td>
<td><?php echo $arr['contact'];?></td>
<td><img src="<?php echo $arr['image'];?>" width="100">   </td>
<td><a href="dashboard.php?id=<?php echo $arr['id'];?>&image=<?php echo $arr['image'];?>"> Delete</td>
</tr>

<?php }   ?>


</table>



</body>
</html>