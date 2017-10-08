<?php 
session_start();

if(empty($_SESSION['user_id']))
	
{
	header('Location:fbreg.html');

}

 ?>
 
 
 
 <?php


extract($_POST);

require_once"testdb.php";

$userid=$_GET['uid'];

	if(isset($update))
	{ 

		if(!empty($fname) || !empty($em_mob) || !empty($password))
			
					{
						echo $sql_update="update fbreg set fname='$fname', em_mob='$em_mob', password='$password' where user_id=$userid"; 
								
								
								 $res=mysqli_query($con,$sql_update);  

									if($res)

									header('location:fbview_users.php');

											else
												
											echo "Not updated";
					}
					
		
				else
						echo " Enter new data first";
	}
?>

<?php 


			$sql_read="select fname,em_mob,password from fbreg where user_id=$userid";

			$rs=mysqli_query($con,$sql_read);
			
			$row=mysqli_fetch_assoc($rs);




?>

<form method="POST" action=" ">

First Name: <input type="text" name="fname"  value="<?php echo $row['fname'];?>" />

<br/><br/>

Email: <input type="text" name="em_mob" value="<?php echo $row['em_mob']; ?>" /> 

<br/><br/>

Password: <input type="text" name="password" value="<?php echo $row['password']; ?>" /> 


<br/><br/>

<input type="submit" name="update" value="Update"/>


</form>