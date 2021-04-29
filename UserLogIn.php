<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Log In Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="background-color:mediumseagreen";>
   
  <?php
  
  $hostname = "localhost";
  $username = "user_1";
  $Password = "234";
  $dbname = "userinfo";

  $conn1 =new mysqli($hostname, $username, $Password, $dbname);
  $user=$password="";

  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
         if(empty($_POST['uname'])||empty($_POST['password']))
         {
          echo "<center>";
          echo "<h2>Fill up the from properly</h2>";
          echo "</center>";
         }
         else if(strlen($_POST['password']) <= 7) 
         {
            echo "Password Must be minimum 8 character!";
         }
         else
         {
            $user=trim($_POST['uname']);
            $password=trim($_POST['password']);
         
            $stmt = $conn1->prepare("select Username,Password from users where Username= ? and Password= ?");
            $stmt->bind_param("ss", $p1,$p2);
            $p1 =$user;
            $p2= $password;
            $stmt->execute();
            $res2 = $stmt->get_result();
            $count=mysqli_num_rows($res2);
            $user = $res2->fetch_assoc();

          if($count>0)
          {
            $_SESSION['user'] = $p1;
            $_SESSION['password'] = $p2;
            $_SESSION['flag'] = true;
            //echo"success";

            header("Location:home.php");
            exit;
           
          }
          else
          {
            echo "Wrong Username or Password! Please Try Again.";

          }
          
      }
    }
     $conn1->close();
?>
  
  
  


  <h2 style="text-align:center;color:white";><em>Login Form</em></h2>
  <p id="errorMsg"></p>
  <form name="loginForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validation()" method="POST" align="center">
   <div>
    <label for="uname"><b>Username</b></label><br>  
    <input type="text" placeholder="Enter Username" name="uname" id="username">
    <br><br>

    <label for="psw"><b>Password </b></label><br> 
    <input type="password" placeholder="Enter Password" name="password" id="password">
    <br><br>
        
    <button type="submit"  style="color:DodgerBlue">Login</button>
    <br>


    
  </div>
  <?php
    echo "<br>";
    echo "<br>";
    include('footer.php');
       
  ?>
  <script>
    function validation()
    {
      var isValid=false;
      var username=document.getElementById("username").value;
      var password=document.getElementById("password").value;
      if(username==""||password=="")
      {
        //console.log("erro");
          document.getElementById('errorMsg').innerHTML = "<h3><center>Please fill up the Login form properly!!!</center></h3>";
          document.getElementById('errorMsg').style.color ="red";
      }
      else
      {
        /*var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            document.getElementById('errorMsg').innerHTML = xhttp.responseText;
            document.getElementById('errorMsg').style.color = "green";
            /*if(this.responseText=="success")
            {
              window.location.href="home.php";
            }
          }
        }

        xhttp.open("POST", , true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("username="+username+"&password="+password);
        //console.log("Can Submit");*/
        isValid=true;
      }
      return isValid;
    }
  </script>


  </form>
</body>
</html>