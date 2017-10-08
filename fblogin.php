<?php

 extract($_POST);

if(isset($login))
	
	{
		
		require_once "testdb.php";
		
		$sql_chk="select * from fbreg where em_mob='$em_mob' and password='$password' ";
		
		$res=mysqli_query($con,$sql_chk);
		
		$count=mysqli_num_rows($res);
		
		if($count==1)
		{
			session_start();
			
			$row=mysqli_fetch_assoc($res);
			
			$_SESSION['user_id']=$row['user_id'];
			
			$_SESSION['email']=$row['em_mob'];
			
			$_SESSION['pwd']=$row['password']; 

		//code to store login date/time

			$fp=fopen('fbloginhistory.txt','a');

			$date_time=date('d-m-Y h:i:s');

			fwrite($fp,$_SESSION['fname']);

			fwrite($fp," ");

			fwrite($fp,$date_time);


		//end
			 
			
			header('Location:fbview_users.php');
		}
		else
		{
			echo "Invalid Login details";
		
			
		}
	}
	
?>
