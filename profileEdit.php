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
	<title></title>
</head>
<body style="background-color:mediumseagreen";>
    <?php
         
        include('home.php');
    ?>

	<?php
	   
	    $hostname = "localhost";
		$username = "user_1";
		$Password = "234";
		$dbname = "userinfo";

		$conn1 =mysqli_connect($hostname, $username, $Password, $dbname);
		 
	    $firstName = $lastName = $gender = $dob = $nid = $address = $phone = $email = $userr = $recEmail="";
	    $firstNameErr = $lastNameErr = $genderErr = $dobErr = $nidErr = $addressErr = $phoneErr = $emailErr = $userErr = $recEmailErr="";
	    if($_SERVER['REQUEST_METHOD']=="POST")
	    {
	    	if(empty($_POST['fname']))
	    	{
	    		$firstNameErr="Plz fill up the first name";
	    	}
	    	else
	    	{
	    		$firstName=trim($_POST['fname']);
	    	}
	    	if(empty($_POST['lname']))
	    	{
	    		$lastNameErr="Plz fill up the last name";
	    	}
	    	else
	    	{
	    		$lastName=trim($_POST['lname']);
	    	}
	    	if(empty($_POST['gender']))
	    	{
	    		$genderErr="Plz Select Gender";
	    	}
	    	else
	    	{
	    		$gender=($_POST['gender']);
	    	}
	    	if(empty($_POST['birthday']))
	    	{
	    		$dobErr="Plz Select your Birthday";
	    	}
	    	else
	    	{
	    		$dob=$_POST['birthday'];
	    	}
	    	if(empty($_POST['nid']))
	    	{
	    		$nidErr="Plz fill up the NID";
	    	}
	    	else
	    	{
	    		$nid=trim($_POST['nid']);
	    	}
	    	if(empty($_POST['preAdd']))
	    	{
	    		$addressErr="Plz fill up the address";
	    	}
	    	else
	    	{
	    		$address=trim($_POST['preAdd']);
	    	}
	    	if(empty($_POST['phone']))
	    	{
	    		$phoneErr="Plz fill up the phone number";
	    	}
	    	else
	    	{
	    		$phone=trim($_POST['phone']);
	    	}
	    	if(empty($_POST['email']))
	    	{
	    		$emailErr="Plz fill up the email";
	    	}
	    	else
	    	{
	    		$email=trim($_POST['email']);
	    	}

	    	if(empty($_POST['newname']))
	    	{
	    		$userErr="Plz fill up the user name";
	    	}
	    	else
	    	{
	    		$userr=trim($_POST['newname']);
	    	}
	    	if(empty($_POST['recemail']))
	    	{
	    		$recEmailErr="Fill up the reccovary email";
	    	}
	    	else
	    	{
	    		$recEmail=trim($_POST['recemail']);
	    	}

	    	if($firstNameErr == "" && $lastNameErr == "" && $genderErr == "" && $dobErr =="" && $nidErr =="" && $addressErr =="" && $phoneErr =="" && $emailErr=="" && $userErr =="" && $recEmailErr=="") 
	    	{

	    		$stmt = $conn1->prepare("select Username,Password from users where Username= ? and Password= ?");
               	$stmt->bind_param("ss", $p1,$p2);
            	$p1 =$_SESSION['user'];
            	$p2=$_SESSION['password'];
            	$stmt->execute();
            	$res2 = $stmt->get_result();
            	$user = $res2->fetch_assoc();

          		if($p1==$user['Username'] &&  $p2==$user['Password'])
          		{
          			$firstame =$_POST['fname'];
            		$lastname =$_POST['lname'];
            		$gender =$_POST['gender'];
            		$DOB=$_POST['birthday'];
            		$NID =$_POST['nid'];
            		$address =$_POST['preAdd'];
            		$phone =$_POST['phone'];
            		$email=$_POST['email'];
            		$user=$_POST['newname'];
            		$Remail=$_POST['recemail'];
            		
		    		$sql="UPDATE users SET Firstname='$firstame',Lastname='$lastname ',Gender='$gender',DateOfBirth='$DOB',NID='$NID ',PresentAdd='$address',Phone='$phone',
                       Email='$email',Username='$user',ReEmail='$Remail' WHERE Username= '{$_SESSION['user']}' and Password= '{$_SESSION['password']}'";
		    		if(mysqli_query($conn1,$sql))
		    		{
		    			echo"<br>";
			   		    echo "Successfully update!";
			   		   // header("Location: home.php");
			  
		            }
		    		 else
		    		{
		    			echo"<br>";
						echo "Failed to update";
						echo $conn1->error;

            		}
            	}
            }

            mysqli_close($conn1);
        }

        
   ?>
   <br><br>
<h1 style="text-align:center; color:white"><em>Profile Update</em></h1>
<p id="errorMsg"></p>
<form name="updateForm"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validate()" method="POST">  
<center>
    <fieldset style="width: 40%; border:2px solid black;"  >
    	<legend><b>Basic information: </b></legend>
    	<table>
    		<tr>
    			<td><label for="firstname">First Name :</label> </td>
    			<td><input type="txt" id="firstname" name="fname" value="<?php echo $firstName ?>"></td>
    			<td><p><?php echo $firstNameErr;?></p></td>
    		</tr>

    		<tr>
    			<td><label for="lastname">Last Name :</label> </td>
    			<td><input type="txt" id="lastname" name="lname" value="<?php echo $lastName ?>"></td>
    			<td><p><?php echo $lastNameErr;?></p></td>
    		</tr>

    		<tr>
			   	<td> <label>Gender:</label></td>
				<td><input type="radio" name="gender"
            	<?php if (isset($gender) && $gender=="male") echo "checked";?>
             	value="male">Male
             	<input type="radio" name="gender"
             	<?php if (isset($gender) && $gender=="female") echo "checked";?>
             	value="female">Female</td>
             	<td><p><?php echo $genderErr;?></p></td>
			</tr>

    		<tr>
    			<td><label>Dob:</label></td>
    			<td><input type="date" id="birthday" name="birthday" value="<?php echo $dob ?>" ></td>
    			<td><p><?php echo $dobErr;?></p></td>
    		</tr>

    		<tr>
    			<td><label for="nid">NID:</label></td>
    			<td> <input type="number" id="nid" name="nid" value="<?php echo $nid ?>"></td>
    			<td> <p><?php echo $nidErr;?></p></td>
    		</tr>
       </table>
    </fieldset>
  </center>   
	     <br>

   <center>
	<fieldset style="width: 40%; border:2px solid black;"  >

		<legend><b>Contract information:</b></legend>
		<table>
			<tr>
				<td><label>Present address:</label></td>
				<td><input type="text" id="presentaddress" name="preAdd" value="<?php echo $address ?>"></td>
				<td><p><?php echo $addressErr;?></p></td>
			</tr>
			<tr>
				<td><label for="phone">Phone:</label></td>
				<td><input type="number" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" value="<?php echo $phone ?>"></td>
				<td><p><?php echo $phoneErr;?></p></td>
			</tr>
			<tr>
				<td> <label for="email">Email:</label></td>
				<td><input type="email" id="EmailId" name="email" value="<?php echo $email ?>"></td>
				<td><p><?php echo $emailErr;?></p></td>
			</tr>
        </table>
      
    </fieldset>
   </center>
        <br>
    <center>
     <fieldset style="width: 40%; border:2px solid black;">
     	<legend><b>User Account Information:</b></legend>
     	<table>
     		<tr>
     			<td><label for="user">User Name :</label> </td>
     			<td><input type="txt" id="username" name="newname" value="<?php echo $userr ?>"></td>
     			<td><p><?php echo $userErr;?></p></td>
     		</tr>
     		<tr>
     			<td><label for="email">Recovary Email:</label></td>
     			<td><input type="email" id="recEmailId" name="recemail"  value="<?php echo $recEmail ?>" ></td>
     			<td> <p><?php echo $recEmailErr;?></p></td>
     		</tr>
     	</table>
	 </fieldset>
    </center>
    <br>
    <center>  <input type="submit" value="Update" style="color:tomato"><center>

   <?php
    echo "<br>";
    echo "<br>";
    include('footer.php');
       
   ?>

   <script>
	    function validate()
		{
			var isValid=false;
			var firstname=document.forms["updateForm"]["fname"].value;
			var lastname=document.forms["updateForm"]["lname"].value;
			var gender=document.forms["updateForm"]["gender"].value;
			var dob=document.forms["updateForm"]["birthday"].value;
			var nid=document.forms["updateForm"]["nid"].value;
			var address=document.forms["updateForm"]["preAdd"].value;
			var phone=document.forms["updateForm"]["phone"].value;
			var email=document.forms["updateForm"]["email"].value;
			var username=document.forms["updateForm"]["newname"].value;
			var Remail=document.forms["updateForm"]["recemail"].value;
			//console.log(firstname + " "+lastname + " "+gender+" "+ email + " " +username+ " "+password+ " "+Remail);
			if(firstname==""||lastname==""||gender==""||dob==""||nid==""||address==""||phone==""||email==""||username==""||Remail=="")
			{
				//console.log("erro");
				  document.getElementById('errorMsg').innerHTML = "<h3><center>Please fill up the form properly!!!</center></h3>";
				  document.getElementById('errorMsg').style.color ="red";
			}
			else
			{
				//console.log("Can Submit");
				isValid=true;
			}
			return isValid;
	    }
	
</script>


   
     


</form>


</body>
</html>

	    	
