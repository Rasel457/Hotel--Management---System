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
    <title>User Details</title>
    <style>       
    hr{
        height: 2px;
        background-color:black;
        border: none;
    }
</style>

</head>
<body style="background-color:mediumseagreen";>
    <?php
         
        include('home.php');
    ?>

    <h1 align="center" style="color:white"><i>Profile Information</i></h1><hr>

    <?php
        $hostname = "localhost";
        $username = "user_1";
        $Password = "234";
        $dbname = "userinfo";

        $conn1 = mysqli_connect($hostname, $username, $Password, $dbname);

        $stmt = $conn1->prepare("select Firstname,Lastname,Gender,DateOfBirth,NID,presentAdd,Phone,Email,Username,ReEmail from  users where Username= ? and Password= ?");
        $stmt->bind_param("ss", $p1,$p2);
        $p1=$_SESSION['user'] ;
        $p2=$_SESSION['password'];
        $stmt->execute();
        $res2 = $stmt->get_result();
        $user = $res2->fetch_assoc();
        mysqli_close($conn1);
       
?>
<table align="center">
    <tr>
       <td> <b><?php echo"User Name:". $user['Username']?></b></td>
    </tr>
    
    <tr>
       <td><b><hr><?php echo "First Name: ". $user['Firstname']?></b></td>
    </tr>
    <tr>
       <td><b><hr><?php echo "Last Name: ". $user['Lastname']?></b></td>
    </tr>
    <tr>
       <td><b><hr><?php echo "Date of Birth: ". $user['DateOfBirth']?></b></td>
    </tr>
    
    <tr>
       <td><b><hr><?php echo "Gender: ". $user['Gender']?></b></td>
    </tr>
    <tr>
       <td><b><hr><?php echo "NID: ". $user['NID']?></b></td>
    </tr>
    <tr>
       <td><b><hr><?php echo "Address: ". $user['presentAdd']?></b></td>
    </tr>
    <tr>
       <td><b><hr><?php echo "phone: ". $user['Phone']?></b></td>
    </tr>
    <tr>
       <td><b><hr><?php echo "Email: " .$user['Email']?></b></td>
    </tr>
    <tr>
       <td><b><hr><?php echo "Recovary Email: " .$user['ReEmail']?></b></td>

    </tr>
    

</table>

<br><br><br>
<?php
include('footer.php');
?>




</body>
</html>




