
<?php

session_start();
echo "<CENTER>";

		$serverName = "localhost";
		$userName = "root";
		$password = "root";
		
	
		if(empty($_SESSION))	
		{	$_SESSION['Username']='Guest';
			$_SESSION['Password']='Guest';
		}
		
// *************Create connection *********


		$connection = mysqli_connect($serverName, $userName, $password);


//***************Check Connection **********


		if(!$connection)
		{
			die("Connection Failed ".mysqli_connect_error());
		}

		mysqli_select_db($connection, 'FULLSTACK');
		
		


	if($_SESSION['Username']!='Guest' && $_SESSION['Password']!='Guest')										//CHECKING IF USER HAS LOGGED IN RECENTLY
				echo "<H1>You already Logged in, <A href='../HTML/Homepage.html'>Click Here </A></H1></CENTER>";
	else
	{
	 if(!empty($_POST))
		{
			
			if($_POST['Operation']=='Login')																	//CHECKING IF LOGIN CLICKED
			{
				
				if(trim($_POST['Username'])=='' || trim($_POST['Password'])=='')								//CHECKING IF USERNAME AND PASSWORD ARE NOT EMPTY
		
					echo "<H1> Please Enter Required Fields </H1> </CENTER>";
				
				else
					{ 	
						$Username = NULL;
						$Password = NULL;

						$Query ="SELECT * FROM UserDatabase WHERE Username = '$_POST[Username]'";
						$results = mysqli_query($connection,$Query);
						
						
						
						if(mysqli_num_rows($results)>0)
						{		
							$row=$results->fetch_assoc();														//FETCH DATA IF USER EXISTS
							
							$Username=$row['Username'];
							$Password=$row['Password'];
							
							if($Password == $_POST['Password'])													//CHECKING PASSWORD 
							{
								$_SESSION['Username']=$_POST['Username'];
								$_SESSION['Password']=$_POST['Password'];
								echo "<H1>Successfully Login </H1></CENTER> ";
								
							}
							else
								echo "<H1> Password Not Matched , Retry </H1></CENTER>";											//OF PASSWORD NOT MATCH
								
						}
						
						else 
							echo "<H1>User Not Exist</H1></CENTER>";																//IF USER NOT EXIST
						
						
					}
					
			}
			else																							//USER IS GUEST
			{
					$_SESSION['Username'] = 'Guest';
					$_SESSION['Password'] = 'Guest';
					echo "<H1>Guest Access, <A href='../HTML/Homepage.html'>Click Here </A></H1></CENTER>";
					
			}
			
		}																									//END NOT EMPTY POST PROCESS
	
	}
	
	
			 
		
?>

















	
	

