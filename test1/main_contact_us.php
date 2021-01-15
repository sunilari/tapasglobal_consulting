<!DOCTYPE HTML>
<html lang="en">
	<?php include('main_html_head.php'); ?>
    

<!---------------------- START: Header ------------------------------->
	<?php include('main_header.php'); ?>
        
<!----------------------  END: Header ------------------------>

	<body>

<!---------------------- START: Image Slie Show ------------------------->
		<?php /*include('main_slideshow.php'); */?>
<!----------------------  End: Image Slie Show ---------------------->

<!----------------------  START: Main ----------------------------------------->
	    <div class="main_page">
		   <?php /*include('main_side_bar_menu.php'); */?> 
			 <div class="main_article">
				<div class = "page_para_div_services_page_recruitment">
					
					<?php
					// define variables and set to empty values
					$nameErr = $emailErr = $genderErr = $websiteErr = $primary_skillsErr = "";
					$name = $email = $gender = $comment = $website = $primary_skills = "";
					$input_data_validation = 'pass';

					if ($_SERVER["REQUEST_METHOD"] == "POST") {
					  if (empty($_POST["name"]) || (strlen($_POST["name"]) >200)) {
						$nameErr = "Name is required and maximum length 100 characters";
						$input_data_validation = 'failed';
					  } else {
						$name = test_input($_POST["name"]);
						// check if name only contains letters and whitespace
						if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
						  $nameErr = "Only letters and white space allowed"; 
						  $input_data_validation = 'failed';
						}
					  }
					  
					  if (empty($_POST["email"]) || (strlen($_POST["email"]) >200)) {
						$emailErr = "Email is required and maximum length 100 characters";
						$input_data_validation = 'failed';
					  } else {
						$email = test_input($_POST["email"]);
						// check if e-mail address is well-formed
						if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						  $emailErr = "Invalid email format"; 
						  $input_data_validation = 'failed';
						}
					  }
					  
						if (empty($_POST["primary_skills"])|| (strlen($_POST["primary_skills"]) >100)) {
						$primary_skillsErr = "Primary skill/s required and maximum length 100 characters";
						$input_data_validation = 'failed';
					  } else {
						$primary_skills = test_input($_POST["primary_skills"]);
						// check if e-mail address is well-formed
						if (!preg_match("/^[a-zA-Z 0-9+,]*$/",$primary_skills)) {
						  $primary_skillsErr = "Invalid skills format, skills should be seperated by comma (,)"; 
						  $input_data_validation = 'failed';
						}
					  }
						
					  if (empty($_POST["website"]) || (strlen($_POST["website"]) >100)) {
						$website = "";
					  } else {
						$website = test_input($_POST["website"]);
						// check if URL address syntax is valid (this regular expression also allows dashes in the URL)
						if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
						  $websiteErr = "Invalid URL"; 
						  $input_data_validation = 'failed';
						}
					  }

					  if (empty($_POST["comment"])) {
						$comment = "";
					  } else {
						$comment = test_input($_POST["comment"]);
					  }

					  if (empty($_POST["gender"])) {
						$genderErr = "Gender is required";
						$input_data_validation = 'failed';
					  } else {
						$gender = test_input($_POST["gender"]);
					  }
					}

					function test_input($data) {
					  $data = trim($data);
					  $data = stripslashes($data);
					  $data = htmlspecialchars($data);
					  return $data;
					}
					?>

					<h2>Please fill the below details</h2>
					<br>
					<!--
					<p><span class="error">* required field</span></p>
					<br><br>
					-->
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<!--
						<label for="fname">First Name</label>
						<input type="text" id="fname" name="firstname" placeholder="Your name.."> 
						-->
												
						Name : 
						<input type="text" name="name" value="<?php echo $name;?>" placeholder="Your name..">
						<span class="error"> <?php echo $nameErr;?></span>
						
						<br>
						E-mail : <input type="text" name="email" value="<?php echo $email;?>" placeholder="Email ID..">
						<span class="error"> <?php echo $emailErr;?></span>
						<br>
						Website : <input type="text" name="website" value="<?php echo $website;?>" placeholder="Website (optional)..">
						<span class="error"><?php echo $websiteErr;?></span>
						<!--
						Skill : <input type="text" name="primary_skills" value="<?php echo $primary_skills;?>" placeholder="Primary skliss..">
						<span class="error"> <?php echo $primary_skillsErr;?></span>
						-->
						<br>
						Comment : <textarea name="comment" rows="5" cols="40" placeholder="Your website (optional).."><?php echo $comment;?> </textarea>
						<!--
						Gender :
						<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
						<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
						<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
						<span class="error"> <?php echo $genderErr;?></span>
						-->
						<br>
						<input type="submit" name="submit" value="Submit"> 
						
						
						<?php

						/*   echo $input_data_validation; */

							if(isset($_POST["submit"]) && ($input_data_validation == 'pass')) {

								$to = 'iet.sunil@gmail.com';

								$subject = 'Website Change Reqest';

								$headers = "From: " . $email . "\r\n";
								$headers .= "Reply-To: ". strip_tags($_POST["email"]) . "\r\n";
								$headers .= "CC: susan@example.com\r\n";
								$headers .= "MIME-Version: 1.0\r\n";
								$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

								$message = $comment;

								mail($to, $subject, $message, $headers);
						}
						?>

					</form>
						<form action="uploadfile.php" method="POST" enctype="multipart/form-data">
						<input type="file" name="fileToUpload" />
						<!--  <input type="submit"/>  
						<button type="submit">Upload</button> -->
						<input type="submit" value="Upload" />
					</form>
				</div>
			</div>
	     <!-- <div class="main_3rd_column">
			<h1> Main heading 2 </h1>
		 </div>
		 -->
	   </div>
<!--------------------------- END: Main --------------------------------------->
<!--------------------------- START: Footer ----------------------------------------->

		<?php include('main_footer.php'); ?>
<!--------------------------- END: Footer! --------------------------------->
<!--------------------------- Function:  Header Navigation ----------------------------------------->
<script type="text/javascript" src="main_script_1.js"></script>	

    </body>
</html>