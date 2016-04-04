	<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <link type="text/css" rel="stylesheet" href="/assets/stylesheets/style.css"> 
   <title>Friend Deets</title>
  </head>

   <body>
   	<div id="wrap">

   		<?= $info['alias']; ?>'s Profile</div>
		<a href="/main">Home</a> 
		<div class='header' id='logout'><a href='/Friends/logout'>Logout</a></div>
		<h3>Name: <?= $info['name'] ?></h3>
		<h3>Email Address: <?= $info['email'] ?></h3>

   	</div>

    </body>
</html>