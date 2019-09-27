<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
require_once('gmail.php');
if($_POST){
	if($_POST['subject']=='' || $_POST['subject']==null){
		if(isset($_POST["name"])){
			if (!preg_match("/^[a-zA-Z ]*$/",$_POST["name"])) {
				$nameError = "Only letters and white space allowed"; 
			} else{
				if(isset($_POST["email"])){
					if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
						$emailError = "Invalid email format"; 
					} else{
						if(isset($_POST["message"])){
							smtpmailer($_POST["email"], $_POST["name"], $_POST["message"]);
						} else {
							$messageError = "Message is required";
						}
					}
				} else{
					$emailError = "Email is required";
				}
			}
		} else{
			$nameError = "Name is required";
		}	
	}
	$spamError="You are not human!";
}
?>