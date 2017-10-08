<?php 
session_start();

if(empty($_SESSION['user_id']))
	
{
	
	header('Location:fbreg.html');
	

	
}

 ?>
 
 
 <?php 

if(!empty ($_GET['uid']))
{
	if(is_int((int)$_GET['uid']))
	{
		require_once"testdb.php";
		
		$userid=$_GET['uid'];
		
		$sql_delete="delete from fbreg where user_id=$userid";
		
		$res=mysqli_query($con,$sql_delete);
		
		if($res)
			
			header('location:fbview_users.php');
			
		else
			
			echo "not deleted";
	}
			else
				
			{
				echo "invalid user id";
				
			}
}
			else
				{
					echo "Something went wrong...!";
					
				}

?>