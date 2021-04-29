<!DOCTYPE html>
<html>
<head>
	<title>Reservation Form Action</title>
</head>
<body style="background-color:mediumseagreen";>
	<?php
	 	$hostname = "localhost";
		$username = "user_1";
		$Password = "234";
		$dbname = "userinfo";

		$conn1 = mysqli_connect($hostname, $username, $Password, $dbname);

		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
         	if(empty ($_POST['username'])||empty ($_POST['firstname']) || empty($_POST['lastname'])||empty($_POST['address'])||empty($_POST['phone'])||empty($_POST['email'])||empty($_POST['roomtype'])||empty($_POST['guest'])||empty($_POST['arrival'])||empty($_POST['departure']))
         	{
         		echo "<center><h2>Fill up the from properly</h2></center>";
            }
            else
            {
         
	       /** 	$arr1 = array('Username' =>$_POST['uname'], 'Firstname' =>$_POST['fname'], 'Lastname' =>$_POST['lname'], 		'Address' =>$_POST['preAdd'],'Phone'=>$_POST['phone'],'Email'=>$_POST['email'],'RoomType'=>$_POST['roomtype'],
	        	'guest'=>$_POST['quantity'],'Arrival'=>$_POST['arrival'],'Departure'=>$_POST['departure']);
            	$json_encoded_1 = json_encode($arr1);
            	$f1 = fopen("Reservation.txt", "a");
            	fwrite($f1, $json_encoded_1 . "\n");
                fclose($f1);
                echo "<h2><center>Request Sent Successfully<center></h2> ";*/

            	$user=$_POST['username'];
           		$firstname =$_POST['firstname'];
				$lastname =$_POST['lastname'];
				$address =$_POST['address'];
				$phone =$_POST['phone'];
				$email=$_POST['email'];
				$roomtype=$_POST['roomtype'];
				$guest=$_POST['guest'];
				$arrival=$_POST['arrival'];
				$departure=$_POST['departure'];
			
				$sql ="insert into reservation values('','{$user}','{$firstname}','{$lastname}','{$address}','{$phone}','{$email}','{$roomtype}','{$guest}','{$arrival}','{$departure}')";
		   		$result = mysqli_query($conn1,$sql);
		    	if($result)
		    	{
		    		echo"<br>";
		    		echo"<center>";
		    		echo"<big>";
			   		echo "Request Sent Successfully!";
			   		echo"</big>";
			   		echo"</center>";
			  		//header('Location:UserLogIn.php');
               		//exit;
		    	}
		    	else
		   		{
		   			echo"<br>";
		   			echo"<center>";
		   			echo"<big>";
                	echo "Failed to insert";
                	echo"</big>";
			 		echo"</center>";

            	}
			 

         }
		
	}
	mysqli_close($conn1);
	
?>






</body>
</html>