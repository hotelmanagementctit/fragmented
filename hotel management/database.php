 <?php

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


//****************Creating Databases ***********


		$databaseCreate = "CREATE DATABASE IF NOT EXISTS FULLSTACK ";

		if( mysqli_query($connection, $databaseCreate))
		{

			echo " Database Created Successfully with Required Tables";

			mysqli_select_db($connection, 'FULLSTACK');





		//**************Create Vehicle Table ************


				$UserDatabase = "CREATE TABLE IF NOT EXISTS UserDatabase ( Username varchar(30) PRIMARY KEY NOT NULL,
																		   Password varchar(50) NOT NULL)";

				mysqli_query($connection, $UserDatabase);







		}

		else
			echo "Error creating Database : ".mysqli_error($connection);








	mysqli_close($connection);

?>
