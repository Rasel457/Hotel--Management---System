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
        <title>Change Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body style="background-color:mediumseagreen";>
        <?php
         
         include('home.php');
        ?>
        <?php
            
            $newpass="";
            $emptyerr = $passerr = $currenterr= "";
            
            $hostname = "localhost";
            $username = "user_1";
            $Password = "234";
            $dbname = "userinfo";

            $conn1 =  mysqli_connect($hostname, $username, $Password, $dbname);       

           

            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Change Password") 
            {

                if(empty($_POST['currentpassword']) || empty($_POST['newpassword']) ||empty($_POST['confirmpassword'])) 
                {
                    
                    $emptyerr = "<b>Please Fill up the form properly!!!</b>";
                }
                else
                {
                    $newpass=$_POST['newpassword'];
                }

                if($_POST['currentpassword']!=$_SESSION['password'])
                {
                    $currenterr= "Please Enter Right Current Password!!!";
                    echo"<center>";
                    echo"<br>";
                    echo"<b>";
                    echo" $currenterr";
                    echo"</b>";
                    echo"</center>";
                }
                else
                {
                    $current=$_POST['currentpassword'];
                }
                

                if($_POST['newpassword'] != $_POST['confirmpassword']) 
                {
                   
                    $passerr="<b>Password doesn't Match!!!</b>";
                }
                 else
                {
                    $newpass=$_POST['newpassword'];
                }

                if(strlen($_POST['newpassword']) <= 7) 
                {
                  
                    $passerr="<b>Password Must be minimum 8 character!!!</b>";
                }
                 else
                {
                    $newpass=$_POST['newpassword'];
                }
                if ( $emptyerr=="" && $passerr=="" && $currenterr== "")
                {
                    
                    
                    $stmt = $conn1->prepare("select Username,Password from users where Username= ? and Password= ?");
                    $stmt->bind_param("ss", $p1,$p2);
                    $p1=$_SESSION['user'];
                    $p2=$_SESSION['password'];
                    $stmt->execute();
                    $res2 = $stmt->get_result();
                    $user = $res2->fetch_assoc();

                    if($p1==$user['Username'] &&  $p2==$user['Password'])
                    {
                      
                        $stmt2  =mysqli_prepare($conn1,"update users set Password=? where Username= ? and Password= ?");
                        mysqli_stmt_bind_param($stmt2,"sss",$p5, $p3,$p4);
                        $p5=$_POST['newpassword'];
                        $p3=$_SESSION['user'];
                        $p4=$_SESSION['password'];;
                        $result = mysqli_stmt_execute($stmt2);
                        if($result)
                        {
                           
                            header("Location:UserLogIn.php");
              
                        }
                        else
                        {
                            echo"<br>";
                            echo"<b>";
                            echo "Failed to change";
                            echo"</b>";
                        }
                    }
                    else
                    {
                        echo"<br>";
                        echo"Username or password doesn't match";
                    }
                }
                mysqli_close($conn1);

            
                    
         

               
            }
           if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Back") 
           {
                unset($_SESSION['user']);
                unset($_SESSION['password']); 
                  
                header("Location:UserLogIn.php");
            }
            
            
        ?>
        <br><br><br>
        <h3 align="center" style="color:white"><big>CHANGE PASSWORD</big></h3>
        <p id="errorMsg"></p>
        <form name="passChangeForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"onsubmit="return valid()" method="POST" align="center">
            
        Current Password:<br>
        <input type="password" name="currentpassword" placeholder="Current Password"><span id="currentPassword" class="required"></span>
        <br>
        <?php echo $emptyerr ?>
       
        
        
       
        <br>
        New Password:<br>
        <input type="password" name="newpassword" placeholder="New Password"><span id="newPassword" class="required"></span>
        <br>
         <?php echo $passerr ?>
        <br>
        Confirm Password:<br>
        <input type="password" name="confirmpassword" placeholder="Confirm Password"><span id="confirmPassword" class="required"></span>
        <br>
        
        <br><br>
        <input type="submit" value="Change Password" style="color:tomato" name="button">
        <br>
        <br>
        <input type="submit" value="Back"  style="color:tomato" name="button">

        <?php
         echo "<br>";
         echo "<br>";
         include('footer.php');
        ?>
        <script>
            function valid()
            {
               var isValid=false;
               
               var currentPass=document.forms["passChangeForm"]["currentpassword"].value;
               var newpassword=document.forms["passChangeForm"]["newpassword"].value;
               var confirmpassword=document.forms["passChangeForm"]["confirmpassword"].value;
               if(currentPass==""||newpassword=="" ||confirmpassword=="")
               {
                document.getElementById("errorMsg").innerHTML="<b><center>Fill Up the form properly!!!</center></b>"
                document.getElementById('errorMsg').style.color ="red";
               }
              
               else if(newpassword != confirmpassword)
               {
                document.getElementById("errorMsg").innerHTML="<b><center>Password doesn't Match!!!</center></b>"
                document.getElementById('errorMsg').style.color ="red";
               }
               else if(newpassword.length <= 7) 
               {
                document.getElementById("errorMsg").innerHTML="<b><center>Password Must be minimum 8 character!!!</center></b>"
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