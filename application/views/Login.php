<!DOCTYPE html>
<html>
<head>
   <title>Login</title>
   <link type="text/css" rel="stylesheet" href="/assets/stylesheets/style.css"> 
   <style>

   fieldset {
   	width: 300px;
   }

   </style>
   </head>

 <body>
	  <div id="wrapper">

<?php 
  if($this->session->flashdata("errors")) {
    echo $this->session->flashdata("errors");
  }
?>

		 <form action='Friends/register' method='post'>
		  	<fieldset>
		  	<legend><h2> Register! </h2></legend>
			    	<p> Name:<input type='text' name='name'> </p>
			    	<p> Alias:<input type='text' name='alias'></p>
			    	<p> Email:<input type='email' name='email'></p> 
			     	<p> Password:<input type='password' name='password'></p>
			     	<p> Confirm Password: <input type='password' name=confirm></p>
			     	<p> Birth Date:<input type='date' name='dob' placeholder= 'mm/dd/yy'> </p>  
			 		<p> <input type='submit' id = 'blue' value='Register!'> </p>
			</fieldset>
		 </form>

		<form action='/Friends/login' method='post'>
		  	<fieldset>
		  	<legend><h2> Login! </h2></legend>
				    <p> Email:<input type='email2' name='email2'></p> 
				    <p> Password:<input type='password' name='password2'></p> 
				   	<p> <input type='submit' value='Login!'> </p>
			</fieldset>
		</form>
	</div>
</body>
</html>