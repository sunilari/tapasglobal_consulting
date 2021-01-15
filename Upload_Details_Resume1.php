<html><head>




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

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Skill: <input type="text" name="primary_skills" value="<?php echo $primary_skills;?>">
  <span class="error">* <?php echo $primary_skillsErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit"> 

  <?php

/*   echo $input_data_validation; */
  
  if(isset($_POST["submit"]) && ($input_data_validation == 'pass')) {
  				  

/* $servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myDB"; */

include 'config/config_data.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "Please email (tanvi@tapasglobalconsulting.com) your profile along with the details, there is connection issue now";
}

// sql to create table

$sql = "CREATE TABLE IF NOT EXISTS MyGuests_1 (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	full_name VARCHAR(100) NOT NULL,
	email_id VARCHAR(100) NOT NULL,
	skills_1 VARCHAR(100) NOT NULL,
	comment_1 VARCHAR(250) NOT NULL,
	gender_1 VARCHAR(10) NOT NULL,
	reg_date TIMESTAMP
	)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests_1 created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$time = date("Y-m-d h:m:s", time());


$sql = "SELECT email_id FROM MyGuests_1 WHERE email_id = '$email'";
$result = $conn->query($sql);

echo "$result->num_rows";
if ($result->num_rows == 0) {
			//..............................
			$sql = "INSERT INTO MyGuests_1 (full_name, email_id, skills_1, comment_1, gender_1, reg_date)
			VALUES ('$name', '$email', '$primary_skills', '$comment', '$gender', '$time')";
			

			if ($conn->multi_query($sql) === TRUE) {
				echo "New records created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			

		} else {
			echo "$email"." already being used, Please use another email ID, or email at tanvi@tapasglobalconsulting for any query";
		}



		

$sql = "DELETE FROM MyGuests_1 WHERE id=3";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$sql = "SELECT id, full_name, email_id, skills_1, comment_1, gender_1, reg_date FROM MyGuests_1";
$result = $conn->query($sql);

echo "<table border='1'>
	<tr>
		<th>#</th>
		<th>Date</th>
		<th>Name</th>
		<th>Email ID</th>
		<th>Skills</th>
		<th>Comment</th>
		<th>Gender</th>
		<th>Delete</th>
	</tr>";
	
if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		/* echo "id: " . $row["id"]. " - Name: " . $row["full_name"]. " Email: " . $row["email_id"]." Skills: " . $row["skills_1"]." Comments: " . $row["comment_1"]." Gender: " . $row["gender_1"]."<br>"; */
		$delete = "delete.php?userID="  . $row["id"];
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['reg_date'] . "</td>";
		echo "<td>" . $row['full_name'] . "</td>";
		echo "<td>" . $row['email_id'] . "</td>";
		echo "<td>" . $row['skills_1'] . "</td>";
		echo "<td>" . $row['comment_1'] . "</td>";
		echo "<td>" . $row['gender_1'] . "</td>";
		/* echo "<td><a href='{$delete}'>Delete User</a></td>"; */



		echo "</tr>";
	}
	} else {
		echo "0 results";
	}


echo "</table>";

function delete_row() {
	$sql = "DELETE FROM MyGuests_1 WHERE id=5";

	if ($conn->query($sql) === TRUE) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}

  }


$conn->close();

  }
  ?>
  </form>


  
  



<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $primary_skills;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>


 

<form action="uploadfile.php" method="POST" enctype="multipart/form-data">
<input type="file" name="fileToUpload" />
<!--  <input type="submit"/>  
<button type="submit">Upload</button> -->
<input type="submit" value="Upload" />
</form>
		
			
			
</head>

</html>
