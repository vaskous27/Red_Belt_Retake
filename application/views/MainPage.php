<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <link type="text/css" rel="stylesheet" href="/assets/stylesheets/style.css"> 
   <title>Main Page</title>
  </head>

   <body>
      <div id="container">
       <div class = 'header'>Hello, <?php echo $this->session->userdata("currentUser")['alias']; ?>!</div>
          <div class='header' id='logout'><a href='/Friends/logout'>Logout</a></div>

<?php 
		if (count($friends)) {		
?>
	          <h3> Here is a list of your friends: </h3>

	          <table>
	            <thead>
	              <tr>
	                <th>Alias</th>
	                <th>Action</th>
	              <tr>
	            </thead>
	          	<tbody>
<?php
	        	foreach($friends as $friend) {				
?>
				<tr>
					<td><?= $friend['alias'] ?></td>
					<td> <a href="friend/<?= $friend['friend_id'] ?>">View Profile</a> / <a href="delete/<?= $friend['friend_id'] ?>">Remove Friend</a></td>
				</tr>
<?php
				}
?>
			  	</tbody>
			</table>
<?php
		    }
		    else {
?>
				<p>You don't have any friends yet...</p>
<?php
	    }

	    if (count($notFriends)) {
?>
	          <h3>Other Users not on your friend's list:</h3>

	            <table>
		            <thead>
		              <tr>
		                <th>Alias</th>
		                <th>Action</th>
		              <tr>
		            </thead>
		            <tbody>
<?php
				foreach($notFriends as $notFriend) {
?>
					  <tr>
							<td><?= $notFriend['alias'] ?></td>	

							<td> <form method="POST" action="add/<?= $notFriend['id'] ?>">
								<input type="submit" value="Add as Friend">
								</form></td>
					  </tr>
<?php
				}
?>

	            </tbody>
          </table>
<?php
		}
?>

      </div>
  </body>
</html>