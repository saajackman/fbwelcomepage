<?php 

session_start();

if(empty($_SESSION['user_id']))
	
{

 header('Location:fbreg.html');
 
}


?>

<table border="1">

<tr><th>S.no</th><th>FirstName</th><th>Surname</th><th>Mobile OR Email</th><th>Actions</tr>

<a href="fblogout.php" style="text-decoration:none">Logout</a>

<?php


require_once "testdb.php";

$sql_qry=" select * from fbreg where user_id=$_SESSION[user_id] ";

$users=mysqli_query($con,$sql_qry);

$i=1;


while($user=mysqli_fetch_assoc($users))
	
{
	echo "<br/>";

	echo "Welcome ".$user['fname'];

	?>
	
	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $user['fname'];?></td> 
		<td><?php echo $user['sname'];?></td> 
		<td><?php echo $user['em_mob'];?></td>
		
		
		<td>
		
		<a href="fbupdate.php?uid=<?php echo $user['user_id'];?>" style="text-decoration:none">Update</a>
		
		<a href="fbdelete.php?uid=<?php echo $user['user_id'];?>" style="text-decoration:none">Delete</a>
		
		</td>
	
	</tr>
	

	
	<?php
	
	
	$i++;
	
}


?>


</table>