<?php 
require 'header.php';
?>

<main>
	<div class = "wrapper-main">
		<section class = "section-default">
		

		
		<?php 
		if (isset($_SESSION['userId'])) {
			echo '<p class = "login-status"> You are logged in! </p>';
		}
		elseif (isset($_GET['error'])) {
			if ($_GET['error'] == "loginemptyfields") {
				echo '<p class = "signinerror"> Provide Username and Password</p>';
			}
			elseif ($_GET['error'] == "sqlerror") {
				echo '<p class = "signinerror"> Data Server error</p>';
			}
			elseif ($_GET['error'] == "nouser") {
				echo '<p class = "signinerror"> User not present, please provide the valid Email-ID or Signup</p>';
			}
			elseif ($_GET['error'] == "wrongpwd") {
				echo '<p class = "signinerror"> Invalid Password</p>';
			}
			elseif ($_GET['error'] == "usertaken") {
				echo '<p class = "signinerror"> Email ID already present</p>';
			}
		}
			else {
			echo '<p class = "login-status"> You are logged out! </p>';
		}
		
		?>
		
	</section>
</div>
</main>

<?php 
//require 'footer.php';

?>