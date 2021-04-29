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

<?php 
	
	    $u="";
	    $hostname = "localhost";
  		$username = "user_1";
  		$Password = "234";
  		$dbname = "userinfo";

 		 $conn1 =new mysqli($hostname, $username, $Password, $dbname);
        /*$log_file = fopen("Login.txt", "r");
        $data = fread($log_file, filesize("Login.txt"));
        fclose($log_file);
        $data_filter = explode("\n", $data);
        for($i = 0; $i< count($data_filter)-1; $i++) {
        $json_decode = json_decode($data_filter[$i], true);
        if($json_decode['user'] == $_SESSION['user'] && $json_decode['password'] ==$_SESSION['password']) 
        {
            $username=$_SESSION['user'];

        }
      }*/
        $stmt = $conn1->prepare("select Username,Password from users where Username= ? and Password= ?");
        $stmt->bind_param("ss", $p1,$p2);
        $p1=$_SESSION['user'] ;
        $p2=$_SESSION['password'];
        $stmt->execute();
        $res2 = $stmt->get_result();
        $user = $res2->fetch_assoc();
        if($p1==$user['Username'] &&  $p2==$user['Password'])
        {
         	$u=$user['Username'];
   
        }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color:mediumseagreen";>
    <?php
         
        include('home.php');
    ?>
	
	<h1 style="text-align:center; color:white;"><em>Delete Profile</em></h1>
</div>
<center>
<div >
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<table>
			<tr>
				<td> <b><big><?php echo "Are you sure to delete $u's  account?" ?></big></b> </td>
			</tr>
			<tr>
				<td>
                    <br><br>
				<center><input type="submit" name="delete" value="Delete" style="color:DodgerBlue"></center>
				</td>
			</tr>
		</table>
	</form>
</div>
</center>
<br><br><br><br>
<?php
   
	if(isset($_POST['delete']))
	{

		$stmt1 = $conn1->prepare("delete from users where Username= ? and Password= ?");
		$stmt1->bind_param("ss", $p1,$p2);
		$p1 =$_SESSION['user'];
		$p2=$_SESSION['password'];

		$status = $stmt1->execute();

		if($status) 
		{
			//echo "Data Delete Successful!";
			header("Location: layout.php");
		}
		else 
		{
			echo "Failed to Delete Data.";
			echo "<br>";
			//echo $conn1->error;
		}
		/*$user_file = "usertemp.txt";
        $f1 = fopen($user_file, "a");
		$log_filepath = "Temp.txt";
        $f2 = fopen($log_filepath, "a");
       
        $log_file = fopen("Login.txt", "r");
        $data = fread($log_file, filesize("Login.txt"));
        fclose($log_file);
        $data_filter = explode("\n", $data);
        $f3 = fopen("userinfo.txt", "r");
        $data1 = fread($f3, filesize("userinfo.txt"));
        fclose($f3);
        $data_filter1 = explode("\n", $data1);
        
        for($i = 0; $i< count($data_filter)-1; $i++) {
        $json_decode = json_decode($data_filter[$i], true);
        if($json_decode['user'] == $_SESSION['user'] && $json_decode['password'] ==$_SESSION['password']) 
        {
        	for($j= 0; $j< count($data_filter1)-1; $j++) {
            
                $json_decoded = json_decode($data_filter1[$j], true);
                if($json_decoded['user'] == $_SESSION['user'])
                {
            
                $arr1 = array('firstname' =>"", 'lastname' =>"", 'gender' =>"",'DOB' =>"", 'NID' =>"",'address' =>"",'phone' =>"",'email'=>"",'user'=>"",'Remail'=>"");
                $json_encoded_1 = json_encode($arr1);
                fwrite($f1, $json_encoded_1. "\n");

                $userinfo = array('user'=>"",'password'=>"");
                $userinfo_encoded = json_encode($userinfo);
                fwrite($f2, $userinfo_encoded . "\n");  
                          
                }
                else
                {
                	$json_encoded_1 = json_encode($json_decoded);
                    fwrite($f1, $json_encoded_1. "\n");
                }
        
              
             }
         }
         else
         {
        	
            $userinfo_encoded = json_encode($json_decode);
            fwrite($f2, $userinfo_encoded . "\n"); 
         }
     }
     fclose($f1);
     fclose($f2);
    


     $log_file = fopen("usertemp.txt", "r");                    
     $data = fread($log_file, filesize("usertemp.txt"));                    
     fclose($log_file);

     $log_file = fopen("userinfo.txt", "w");
     fwrite($log_file, $data);                    
     fclose($log_file);

     $log_file = fopen("usertemp.txt", "w");
     fwrite($log_file, "");                    
     fclose($log_file);

     $log_file = fopen("Temp.txt", "r");                    
     $data = fread($log_file, filesize("Temp.txt"));                    
     fclose($log_file);

     $log_file = fopen("Login.txt", "w");
     fwrite($log_file, $data);                    
     fclose($log_file);

     $log_file = fopen("Temp.txt", "w");
     fwrite($log_file, "");                    
     fclose($log_file);
                    
                    
      unset($_SESSION['user']);
      unset($_SESSION['password']); 
                   
                    
      header("Location: layout.php");*/

     

    }
    $conn1->close();
    include('footer.php');
?>


</body>
</html>






		
