<!DOCTYPE html>
<html>
<head>
	<title>CSS layout</title>
	<style>
		   *{
           box-sizing: border-box;
        }
        .header 
        {
           background-color: #333;
           padding: 5px;
           font-size: 20px;
           text-align: center;
           border:3px solid black

        }
        .column 
        {
           padding: 10px;
           height: 430px; 
           border:2px solid black
         }
       .footer {
           background-color: rgb(51, 255, 119);
           padding: 30px;
           text-align: center;
           border:2px solid black

        }
        .row 
        {
           display: -webkit-flex;
           display: flex;

        }
         .column.side 
        {
           -webkit-flex: 0.5;
           -ms-flex: 0.5;
           flex: 0.5;

        }
        .column.middle 
        {
           -webkit-flex: 3;
           -ms-flex: 3;
           flex: 3;
           overflow-y : auto;
        }
        ul 
        {
           list-style-type: none;
           margin: 0;
           padding: 0;
        }
        a
        {
          display: block;
          text-decoration: none;
          color:white;
          
        }
        a:hover 
        {
          background: #333;
          color: black;
        }
       
        



	</style>
</head>
<body>
	<div class="header">
       <h2 style="color:white">HOTEL MANAGEMENT SYSTEM</h2>
            <ul>
              <li style="text-align:right;font-size: 100%;" >
              <a href="UserLogin.php">Login</a>
              <a href="UserRegistration.php"> Sign Up</a></li>
            </ul>
    </div>
    <div class="row">
       <div class="column side" style="background-color:rgb(51, 102, 255);font-size: 150%;">
       	   <ul>
               <li><a href="layout.php">Home</a></li>
               <li><a href="Contact.php">Contact</a></li>
               <li><a href="Gallary1.php">Photo Gallery</a> </li>
              <li><a href="Specialoffer.php">Special offer</a></li> 
            </ul>
        </div>
       <div class="column middle" style="background-color:rgb(255, 140, 26);">
        
        
       </div>
    </div>
    <div class="footer">
   <?php include('footer.php'); ?>
    </div>

</body>
</html>