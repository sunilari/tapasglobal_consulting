<?php

if (isset($_POST['signup-submit'])) {
	require 'dbh.inc.php';
	
	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
	
	if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
		header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
		echo '<p class = "signuperror"> Fill in all Fields</p>';
		exit();
	}
	
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username) ) {
		header("Location: ../signup.php?error=invalidmailuid");
		exit();
	}
	
	
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../signup.php?error=invalidmail&uid=".$username);
		exit();
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../signup.php?error=invalidmail&mail=".$email);
		exit();
	}
	
	elseif ($password !== $passwordRepeat) {
		header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
		exit();
	} else {
	
	$sql = "SELECT uidUsers FROM users WHERE emailUsers=?;";
	$stmt = mysqli_stmt_init($conn);
	
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("Location: ../signup.php?error=dataerror");
		exit();
	} else {
		mysqli_stmt_bind_param($stmt, "s", $email);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$resultCheck = mysqli_stmt_num_rows($stmt);
		echo "result num_rows = $resultCheck\n";
		if ($resultCheck >0) {
			header("Location: ../signup.php?error=usertaken&mail=".$email);
			exit();
			}
		else {
			$sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?);";
			$stmt = mysqli_stmt_init($conn);
			
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: ../signup.php?error=dataerror1");
				exit();
				} 
			else {
			$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
			mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			header("Location: ../signup.php?signup=success");
			exit();
			}

		}
	}
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
}

else {
	header("Location: ../signup.php");
	exit();
}