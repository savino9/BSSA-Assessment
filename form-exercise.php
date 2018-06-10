<?php
// set variables 
$nameErr = $lastNameErr = $emailErr = $commentErr = "";
$name = $lastName = $email  = $comment = "";

// main logic 
function inputData($data) {
	// The trim() function removes whitespace and other predefined characters from both sides of a string.
  $data = trim($data);
  // The stripslashes() function removes backslashes added by the addslashes() function.
  $data = stripslashes($data);
  // Convert the predefined characters "<" (less than) and ">" (greater than) to HTML entities: <b>bold</b> => &lt;b&gt;bold&lt;/b&gt;
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	echo "<h2>Your Input:</h2>";
	$name = inputData($_POST["name"]);
	// check if name contains only letters and whitespace
	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		echo $nameErr = "Invalid Name! Only letters and white space allowed!";
		echo "<br>";
	} else {
		echo "Name: " , $name , "<br>";	
	}
	$lastName = inputData($_POST["lastName"]);
	if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
		echo $lastNameErr = "Only letters and white space allowed!";
		echo "<br>";
	} else {
		echo "Last Name: " , $lastName , "<br>";	
	}
	$email = inputData($_POST["email"]);
	// check if the mail address is well-formed
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo $emailErr = "Invalid email format! ";
		echo "<br>";
	} else {
		echo "Email: " , $email, "<br>";	
	}
	$comment = inputData($_POST["comment"]);
	echo 'Comment: ' , $comment , "<br>" ;
}

?>