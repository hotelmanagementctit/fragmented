
<?php

session_start();

echo "<CENTER>";

		$serverName = "localhost";
		$userName = "root";
		$password = "root";
		
		
// *************Create connection *********


		$connection = mysqli_connect($serverName, $userName, $password);


//***************Check Connection **********


		if(!$connection)
		{
			die("Connection Failed ".mysqli_connect_error());
		}

		mysqli_select_db($connection, 'FULLSTACK');
		
		
		
		
		
		

	 if(!empty($_POST))
		{
			
			if($_POST['Operation']=='SIGN UP')																	//CHECKING IF SIGN UP CLICKED
			{
				
				if(trim($_POST['Username'])=='' || trim($_POST['Password'])=='')								//CHECKING IF USERNAME AND PASSWORD ARE NOT EMPTY
					
					echo "<H1>Please Enter Required Fields </H1> </CENTER>";
				
				else
					{ 	
						

						$Query ="SELECT * FROM UserDatabase WHERE Username = '$_POST[Username]'";
						$results = mysqli_query($connection,$Query);
						
						
						
						if(mysqli_num_rows($results)>0)															//CHECKING IF USER ALREADY EXIST
						{	
							echo "<H1>User Already Exist !</H1></CENTER>";
						}
						else
						{
							$Query = "INSERT INTO UserDatabase VALUES('$_POST[Username]','$_POST[Password]')";
							if(mysqli_query($connection,$Query))
								echo "<H1>Welcome To Our Website </H1></CENTER>";
							else	
								echo "<H1>Oops There is some internal Error , please try again Later</H1></CENTER>";
							
						}
								
						
					}
					
			}
			else																										//CANCELLING SIGN UP
			{
					echo "<CENTER><H1>SIGN UP CANCELLED <A href='../HTML/Homepage.html'>Click Here </A></H1></CENTER>";
					
			}
			
		}																									//END NOT EMPTY POST PROCESS
		else
			echo " <H1>Nothing Here</H1></CENTER> ";
	
	
	
			 
		
?>

















	
	

