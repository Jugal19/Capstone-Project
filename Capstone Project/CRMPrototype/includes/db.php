<?php
	// Connection to the the database
	function db_connect()
	{
		return pg_connect("host=".DB_HOST." port=".DB_PORT." dbname=".DATABASE." user=".DB_ADMIN." password=".DB_PASSWORD);
	}
	$conn = db_connect();
	//connection for the users to log on to the site
	$user_select = pg_prepare($conn, "user_select", "SELECT * FROM users WHERE email_address = $1");
	
	//this selects the user from the database and connects to the site
	$user_select_all_stmt = pg_prepare($conn, "user_select_all", "SELECT * FROM users");

	//this selects the contact lists from the database and conncts to the site
	$contact_list_select_all_stmt = pg_prepare($conn, "contact_list_select_all", "SELECT * FROM contacts");
	$contact_select = pg_prepare($conn, "contact_select", "SELECT * FROM contacts WHERE id = $1");

	//this selects the calendar from the database and connects to the site.
	$calendar_select = pg_prepare($conn, "calendar_select", "SELECT * FROM calendar WHERE reminder_date = $1");

	$showings_list_select_all_stmt = pg_prepare($conn, "showings_list_select_all",
	"SELECT * FROM showings");

	$call_list_select_all_stmt = pg_prepare($conn, "call_list_select_all", "SELECT * FROM calls");

	//this selects the keep in touch from the database and connects to the site.
	$events_select_all_stmt = pg_prepare($conn, "events_select_all", "SELECT * FROM events");

	//this selects the main client birthday and sends an reminder to the user
	$client_birthday_select_all_stmt = pg_prepare($conn, "client_birthday_select_all", 
	"SELECT * FROM client_birthday");

	$monthly_enewsletter_select_all_stmt = pg_prepare($conn, "monthly_enewsletter_select_all",
	"SELECT * FROM monthly_enewsletter");

	$move_in_anniversary_select_all_stmt = pg_prepare($conn, "move_in_anniversary_select_all",
	"SELECT * FROM move_in_anniversary");

	/**
	 * This is a function to let users access the sign-in page
	 * 
	 * @param $email_address (this is used as a parameter so it can make the actual sign-in page work.)
	 */

	function user_select($email_address){
		
		// pg_execute is used to execute a previously-prepared statement 
		$result = pg_execute(db_connect(), "user_select", array ($email_address));
				
		if(pg_num_rows($result) > 0)
		{
			// declaring client use to access the sign-in page
			$client =  pg_fetch_assoc($result); // pg_fetch_assoc is used to return the associate array which corresponds to the fetched row of records.
			
			return $client;
		}
		else 
		{
			return false;
		}
	}
	
	/**
	 * This function lets the form to be authenticated when the user tries to logon to the site
	 * if it does not work it will display an error once its retrieved from the database which
	 * would be posed in sign-in.php.
	 * 
	 * @param $email_address
	 * @param $password
	 */
	function user_authenticate($email_address, $password){
		//$result = pg_execute(db_connect(), "user_authenticate", array ($email_address, $password));
		$user = user_select($email_address);
		if($user !== false)
		{
			if(password_verify($password, $user["password"]))
			{
				return $user;
				exit;
			}
		}
		return false;		
	}

	// Started this on November/18th/2020 at 9:19 pm
	function contact_list_select_all()
	{
		// Selecting the table from the clients database
		$contact = pg_execute(db_connect(),"contact_list_select_all",array());
			
		// pg_num_rows was used to return the number of rows from the pgadmin
		$row = pg_num_rows($contact);
		
		$records = pg_fetch_all($contact);
			
		return $records;
	}

	function call_list_select_all()
	{
		$call = pg_execute(db_connect(),"call_list_select_all",array());
			
		// pg_num_rows was used to return the number of rows from the pgadmin
		$row = pg_num_rows($call);
		
		$records = pg_fetch_all($call);
			
		return $records;
	}

	function contact_select($id)
	{
		// Selecting the table from the clients database
		$result = pg_execute(db_connect(),"contact_select",array($id));
			
		// pg_num_rows was used to return the number of rows from the pgadmin
		$row = pg_num_rows($result);
		$contact = "";

		if($row == 1)
		{
			$contact = pg_fetch_assoc($result, 0);
		}
		
		//$records = pg_fetch_all($contact);
			
		return $contact;
	}

	function events_select_all_stmt()
	{
		// Selecting the table from the Keep in touch database
		$keep_in_touch = pg_execute(db_connect(), "events_select_all",array());

		// pg_num was used to eturn the number of rows from the pgadmin
		$row = pg_num_rows($keep_in_touch);
		
		$records = pg_fetch_all($keep_in_touch);

		return $records;
	}

	
	function calendar_select($date)
	{
		// pg_execute is used to execute a previously-prepared statement
		$result = pg_execute(db_connect(), "calendar_select", array ($date));

		$output = "";

		if(pg_num_rows($result) > 0)
		{
			$reminders = pg_fetch_all($result);
			//print_r ($reminders);
			foreach($reminders as $reminder)
			{
				$output .=  "<br/><a style='color: blue;' href=\"mailto:".$reminder['client_email_address'] . "\">".$reminder['client_first_name']." " . $reminder['client_last_name']."</a><br/>".$reminder['note']."<br/>";          

			}

		}
		return $output;

	}

	function showings_list_select_all_stmt()
	{
		// Selecting the table from the Keep in touch database
		$showings = pg_execute(db_connect(), "showings_list_select_all",array());

		// pg_num was used to eturn the number of rows from the pgadmin
		$row = pg_num_rows($showings);
		
		$records = pg_fetch_all($showings);

		return $records;
	}

	function client_birthday_select_all()
	{
		// Selecting the table from the Keep in touch database
		$client_birthday = pg_execute(db_connect(), "client_birthday_select_all",array());

		// pg_num was used to eturn the number of rows from the pgadmin
		$row = pg_num_rows($client_birthday);
		
		$records = pg_fetch_all($client_birthday);

		return $records;
	}

	function monthly_enewsletter_select_all()
	{
		// Selecting the table from the Keep in touch database
		$monthly_enewsletter = pg_execute(db_connect(), "monthly_enewsletter_select_all",array());

		// pg_num was used to eturn the number of rows from the pgadmin
		$row = pg_num_rows($monthly_enewsletter);
		
		$records = pg_fetch_all($monthly_enewsletter);

		return $records;
	}

	function move_in_anniversary_select_all()
	{
		// Selecting the table from the Keep in touch database
		$move_in_anniversary = pg_execute(db_connect(), "move_in_anniversary_select_all",array());

		// pg_num was used to eturn the number of rows from the pgadmin
		$row = pg_num_rows($move_in_anniversary);
		
		$records = pg_fetch_all($move_in_anniversary);

		return $records;
	}
?>