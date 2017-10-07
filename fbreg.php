<?php


extract($_POST);
	
 
include "functions.php";

	if(isset($register))
		{

						 
			if(!empty($fname) && !empty($sname)  && !empty($em_mob) && !empty($password) && !empty($dob) && !empty($gender))
					
				{
					
					$con=mysqli_connect("localhost","root","9amnewbatch");
							
			 
					 if($con)
							   
					{  							
							mysqli_select_db($con,"9amnewbatch");
								  
								 //checking for existancy
								
								 $sql_chk="select em_mob from fbreg where em_mob='$em_mob' ";
						
								 
								 $resultset=mysqli_query($con,$sql_chk);
							
								 
								 //end
								 
									 $count=mysqli_num_rows($resultset);
								
							if($count==0)
						 
								{
									if(!preg_match("/^[a-zA-Z]*$/",$fname) || !preg_match("/^[a-zA-Z]*$/",$sname))
									{
											
											echo "Enter valid name";
												
											 exit;
										  
									}
									
									else
										
									{
										if(!preg_match("/^[a-zA-Z0-9.@]*$/",$em_mob))
										{	
											echo "Please Enter valid Mobile no. or Email";
													
											exit();
										}
										
									}
									
										//$password=base64_encode($password);
									
										$mysqli_insert="insert into fbreg(fname,sname,em_mob,password,dob,gender) values('".format_string($fname)."','".format_string($sname)."','".format_string($em_mob)."','$password','$dob','$gender')";
												
										$result=mysqli_query($con,$mysqli_insert) or die(mysqli_error());
																			
											if($result)
											
											
												    echo "Registration successful";
											 
											else
															 
													echo "Registration failed";
								}
				 
								 else
										 echo "entered mobile or email address already exists";
										 
					}
		  
				
			    }

				else
				
					echo "Please enter all values";
					
				
		}	
	
?>