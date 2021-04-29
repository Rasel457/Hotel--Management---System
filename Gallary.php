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
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
div.gallery {
  margin: 5px;
  border: 1px solid black;
  float: left;
  width: 180px;
}
div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

.open-button {
  background-color: #ffff00;
  color: black;
  border: none;
  cursor: pointer;
  opacity: 0.8;
 }


.form-popup {
  display: none;
}
</style>
</head>  

<body style="background-color:mediumseagreen";>
   <?php
         
        include('home.php');
    ?>
  <h1 style="text-align:center;color:white "><em>Rooms And Rates<em></h1>

<div class="gallery">
  <a target="_blank" href="laxary1.jpg">
    <img src="laxary1.jpg" alt="Luxury Room" width="600" height="400">
  </a>
  <div class="desc"><button class="open-button" onclick="openForm()"><b>$45 Book Now</b></button></div>
</div>

<div class="gallery">
  <a target="_blank" href="laxary2.jpg">
    <img src="laxary2.jpg" alt="Delux Room" width="600" height="400">
  </a>
  <div class="desc"><button class="open-button" onclick="openForm()"><b>$45 Book Now</b></button></div>
</div>

<div class="gallery">
  <a target="_blank" href="laxary3.jpg">
    <img src="laxary3.jpg" alt="Delux Room" width="600" height="400">
  </a>
  <div class="desc"><button class="open-button" onclick="openForm()"><b>$40 Book Now</b></button></div>
</div>

<div class="gallery">
  <a target="_blank" href="single2.jpg">
    <img src="single2.jpg" alt="Single Room" width="600" height="350">
  </a>
  <div class="desc"><button class="open-button" onclick="openForm()"><b>$40 Book Now</b></button></div>
</div>

<div class="gallery">
  <a target="_blank" href="laxary4.jpg">
    <img src="laxary4.jpg" alt="Single Room" width="600" height="350">
  </a>
  <div class="desc"><button class="open-button" onclick="openForm()"><b>$35 Book Now</b></button></div>
</div>


<div class="gallery">
  <a target="_blank" href="laxary5.jpg">
    <img src="laxary5.jpg" alt="Double Room" width="600" height="350">
  </a>
  <div class="desc"><button class="open-button" onclick="openForm()"><b>$30 Book Now</b></button></div>
</div>


 <div class="gallery">
  <a target="_blank" href="single3.jpg">
    <img src="single3.jpg" alt="Single Room" width="600" height="350">
  </a>
  <div class="desc"><button class="open-button" onclick="openForm()"><b>$25 Book Now</b></button></div>
</div>



<div class="form-popup" id="myForm">
  
    <form name="reservationForm" onsubmit="valid(event)">

      <center>
    		<fieldset style="width: 30%; border:2px solid black;" >
    			<legend><b>Room Reservation Form</b></legend>
          <p id="errorMsg"></p>

    	
       			<table>
              <tr>
                <td><label for="user">User Name :</label> </td>
                <td><input type="txt" id="username" name="uname" ></td>
            
              </tr>
       				<tr> 
       					<td><label>First Name :</label> </td>
       					<td><input type="txt" id="firstname" name="fname" ></td>
       		    </tr>
		
					   <tr>
						    <td><label >Last Name :</label> </td>
						    <td><input type="txt" id="lastname" name="lname" ></td>
			
					   </tr>
		
					   <tr>
						    <td><label>Present address:</label></td>
						    <td><input type="text" id="presentaddress" name="preAdd"></td>
			
					   </tr>
					   <tr>
        	      <td><label for="phone">Phone:</label></td>
        	      <td><input type="number" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"></td>
        	
        		  </tr>
					    <tr>
						     <td><label for="email">Email:</label></td>
			           <td><input type="email" id="EmailId" name="email"></td>
			
		          </tr>
		          <tr>
	   	   				<td><label>Room Type:</label></td>
	   	   				<td><select id="room" name="roomtype">
 						    <option value="select">please select</option>
                <option value="standard">Standard</option>
                <option value="family">Family</option>
                <option value="private">Private</option>
                           
                </select></td>
	   	   
	   				  </tr>
	   				  <tr>
						    <td><label>No. of Guests:</label></td>
			          <td><input type="number" id="quantity" name="quantity" min="1" max="6"></td>
			
		          </tr>
	
	   				  <tr>
	   	   				<td><label>Arrival Date&Time:</label></td>
	   	   				<td><input type="datetime-local" id="arrival" name="arrival"></td>
	   	   
	   				  </tr>
	   				  <tr>
	   	   				<td><label>Departure Date&Time:</label></td>
	   	   				<td><input type="datetime-local" id="departure" name="departure"></td>
	   	   
	   				  </tr>
	   	      </table>
    			<br><br>
                <input type="submit"  class="btn" style="color:tomato" value="Request send">
                <button type="button" class="btn cancel" style="color:tomato" onclick="closeForm()">Close</button>
    
    		</fieldset>
            
      </center>
    
    </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>




<?php
  echo"<br>";
  echo"<br>";
  echo"<br>";
  echo"<br>";
  echo"<br>";
  echo"<br>";
  include('footer.php');
?>


<script>
    function valid(event)
    {
      //var isValid=false;
      var username=document.getElementById("username").value;
      var firstname=document.getElementById("firstname").value;
      var lastname=document.getElementById("lastname").value;
      var address=document.getElementById("presentaddress").value;
      var phone=document.getElementById("phone").value;
      var email=document.getElementById("EmailId").value;
      var roomtype=document.getElementById("room").value;
      var guest=document.getElementById("quantity").value;
      var arrival=document.getElementById("arrival").value;
      var departure=document.getElementById("departure").value;
      event.preventDefault();
      
      if(username==""||firstname==""||lastname==""||address==""||phone==""||email==""||roomtype==""||guest==""||arrival==""||departure=="")
      {
        //console.log("erro");
          document.getElementById('errorMsg').innerHTML = "<h3><center>Please fill up the form properly!!!</center></h3>";
          document.getElementById('errorMsg').style.color ="red";
          
      }
      else
      {
    
       var xhttp = new XMLHttpRequest();
        
        xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            document.getElementById('errorMsg').innerHTML = xhttp.responseText;
            document.getElementById('errorMsg').style.color = "white";
          }
        }
        xhttp.open("POST", "ReservationFormAction.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("username="+username+"&firstname="+firstname+"&lastname="+lastname+"&address="+address+
        "&phone="+phone+"&email="+email+"&roomtype="+roomtype+"&guest="+guest+"&arrival="+arrival+"&departure="+departure);

        
        //console.log("Can Submit");
        //isValid=true;
      }
      //return isValid;
     
    }
  
</script>


 



</body>
</html>