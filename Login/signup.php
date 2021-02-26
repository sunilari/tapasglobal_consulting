<?php
require 'header.php';
?>

	<main>
		<div class = "wrapper-main">
			<section class = "section-default">
			<h2> Signup Page: Please fill the below details</h2>
			
			<?php 
			if (isset($_GET['error'])) {
				if ($_GET['error'] == "emptyfields") {
					echo '<p class = "signuperror"> Fill in all Fields</p>';
					}
					elseif ($_GET['error'] == "invaliduidmail") {
						echo '<p class = "signuperror"> Invalid Username or Password</p>';
					}
					elseif ($_GET['error'] == "invalidmail") {
						echo '<p class = "signuperror"> Invalid email id</p>';
					}
					elseif ($_GET['error'] == "passwordcheck") {
						echo '<p class = "signuperror"> Password not matching</p>';
					}
					elseif ($_GET['error'] == "usertaken") {
						echo '<p class = "signuperror"> Email ID already present in the database</p>';
					}
			}
			elseif (isset($_GET['signup'])) {
				if ($_GET['signup'] == "success") {
				echo '<p class = "signupsuccess"> Signup Successful</p>';
				}
			}
			?>
			
			<form class = "form-signup" action="includes/signup.inc.php" method="post">
				<input type = "text" name = "uid" placeholder = "Name">
				<input type = "text" name = "mail" placeholder = "E-mail">
				<input type = "password" name = "pwd" placeholder = "Password">
				<input type = "password" name = "pwd-repeat" placeholder = "Re-type Password">
				<button type = "submit" name = "signup-submit">Signup</button>
				</form>
			</section>

		
		</div>
		
	
	</main>

<?php 
//require 'footer.php';

?>
