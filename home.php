<?php
  
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

  if($_SESSION['flag']==false)
  {
    header('location: layout.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		
		.navbar 
		{
          
           background-color: #333;
           position: fixed;
           top: 0;
           width: 100%;
           height:8%;
        }
        .navbar a 
        {
        	float: left;
  			display: block;
  			color: #f2f2f2;
  			padding: 20px 16px;
  			text-decoration: none;
  			font-size: 17px;
		}
		.navbar a:hover 
		{
  			background: #ddd;
  			color: black;
		}
		
		
	</style>
</head>
<body style="background-color:mediumseagreen";>

<center >
    <br>
        <div class="navbar">
           
         	<a href="userDetails.php">View Profile</a> 
		    <a href="DeleteUser.php">Delete Profile</a> 
		    <a href="ChangePassword.php">Change password</a> 
		    <a href="profileEdit.php">Update Profile</a> 
		    <a href="Gallary.php">Room Reservation</a> 
		    <a href="logout.php";> Logout</a>
		 
        </div>
    <br>

</center>
</body>
</html>	

	