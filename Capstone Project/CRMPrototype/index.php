<?php

	/**
	 * Creating a index page for the user admin who have
	 * logged on to the website
	 *
	 * PHP version 7.1
	 *
	 * @author     Jugal Patel <jugal.patel1@dcmail.ca>
	 * @version    1.0  (September/9th/2020)
	 */
	 
	$title = "Home Page"; 
	include "./includes/header.php";

	// determine that someone is not logged 
	/*header("Location:./sign-in.php");
	ob_flush*/

	/* Added the redirect page on September/14th/2020 */
	//redirect("dashboard.php");
?>

  <h2><?php echo $message; ?></h2>

	<h1>Message.</h1>
	<h2>Please Sign In to see your contents!</h2>

<?php
  include "./includes/footer.php";
?>
  