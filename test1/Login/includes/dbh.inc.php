<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "root";
$dBName = "loginsystemtut";

$conn = mysqli_connect($servername, $dBPassword, $dBPassword, $dBName);

if (!conn) {
	die ("connetion failed: ".mysqli_connect_errno());
}