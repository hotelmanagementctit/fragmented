<?php

session_start();

	if($_SESSION['Username']!='Guest' && $_SESSION['Password']!='Guest')										//CHECKING IF USER HAS LOGGED IN RECENTLY
	{		
				session_unset();																				//FREEZING ALL SESSION VARIABLE
				session_destroy();																				//DESTROYING SESSION 
				
				echo "<CENTER><H1>SUCCESSFULLY LOGGED OUT ! <A href='../HTML/Homepage.html'>CLICK HERE </A></H1></CENTER>";		
	}
	

?>		
		
	