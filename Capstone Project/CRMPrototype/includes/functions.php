<?php
	/**
	 * Shared functions for the site (excluding database)
	 *
	 * PHP version 7.1
	 *
	 * @author     Jugal Patel <jugal.patel1@dcmail.ca>
	 * @version    1.0  (September/9th/2020)
	 */

	/**
	 * Function to redirect to another URL
	 *
	 * @param $url  location to redirect the user to
	 */

	function redirect($url)
	{
		header("Location:".$url);
		ob_flush();
	}

   function dump($arg)
    {
	  echo print "<pre>";
	  print_r($arg);
	  echo "</pre>";
    }

	/**
	 * Placing a message on to the session
	 *
	 * @param $message  is the information / message to be placed on a session
	 */
	function setMessage($message)
	{
		$_SESSION['message'] = $message;
	}

	/**
	 * Retrieves a message from a session
	 *
	 * @return message that was on a seesion
	 */
	function getMessage()
	{
		return $_SESSION['message'];
	}

	/**
	 * Function to set the message to true or
	 * false
	 *
	 * @return true or false 
	 */
	function isMessage()
	{
		return isset($_SESSION['message'])?true:false; // conditional operator
	}
	
	/**
	 * Function removes the message from the session
	 *
	 * @param $_SESSION['message']
	 */
	function removeMessage()
	{
		unset($_SESSION['message']);
	}
	
	/**
	 * Function to get the message which equals to
	 * removeMessage function and returns the $message
	 *
	 * @return $message
	 * 
	 */
	function flashMessage()
	{
		$message = "";
		if (isMessage())
		{
			$message = getMessage();
			removeMessage();
		} 
		return $message;
	}
	
	/**
	 * Function to get the user 
	 *
	 * @return nothing if seession returns 
	 * the user and if not it would return nothing.
	 */
	function getUser()
	{
		if(isset($_SESSION['user']))
		{
			return $_SESSION['user'];
		}
		else
		{
			return "";
		}
	}
	
	 /**
	 * Function to return the user
	 *
	 * @return the session if the user = 0
	 */
	function removeUser()
	{
		return $_SESSION['user']=0;
	}
	
	/**
	 * Function to create the form 
	 *
	 * @param $field creates the form  for
	 * $type, $name, $value and $label by echoing
	 * the form and the button for lab 2
	 */
	function display_form($field)
	{
		for($j =0; $j< count($field); $j++)
		{
			$type = $field[$j]['type'];
			$name = $field[$j]['name'];
			$value = $field[$j]['value'];
			$label = $field[$j]['label'];
			
			echo '
					<div class=form-group text-left">
					<label> '.$label.' </label>
					<input type="'.$type.'" class="form-control" name="'.$name.'" value="'.$value.'" />
					</div>
				 ';			 
		}
		echo '<br/> <button class="btn btn -lg btn-primary btn-block" type="submit" name="submit"> Submit </button>';
	}

	function client_list_table($cell , $records)
	{
		//echoing the table
		echo'
				<div class="table-responsive">
				<table id="table" class="table table-striped table-sm">
				<thead>;
				<tr>;
			';
		
		//The foreach is used to iterate the header for the <th></th> tag.
		
		foreach($cell as $cell => $head)
		{
			echo '<th>'.$head.'</th>';
		}
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		foreach($records as $records => $data)
		{
			echo '<tr>';  
			echo '<td>'.$data["first_name"].'</td>';
			echo '<td>'.$data["last_name"].'</td>';
			echo "<td><a style='color: blue;' href=\"mailto:".$data['email_address']."\">".$data['email_address']."</a></td>"; 
			//echo '<td>'.$data["email_address"].'</td>';
			echo '<td>'.$data["occupation"].'</td>';
			echo '<td>'.$data["job_title"].'</td>';
			//echo '<td>'.$data["source_of_contact"].'</td>';
			//echo '<td>'.$data["business_phone"].'</td>';
			//echo '<td>'.$data["home_phone"].'</td>';
			//echo '<td>'.$data["mobile_phone"].'</td>';
			//echo '<td>'.$data["fax_num"].'</td>';
			echo '<td>'.$data["street"].'</td>';
			echo '<td>'.$data["city"].'</td>';
			echo '<td>'.$data["province"].'</td>';
			//echo '<td>'.$data["zip_code"].'</td>';
			//echo '<td>'.$data["notes"].'</td>';	
			echo '<td><button onclick="location.href=\'./update_contact.php?id='.$data["id"].'\'" type="button">Update Contact</button></td>';
			echo '</tr>';			 		
		}
		
		echo '</table>';
		
		echo "<script>";
		echo "$(document).ready(function(){ $('#table').dataTable(); });";
		echo "</script>";
		
	}

	function update_client_list_table($cell , $records)
	{
		//echoing the table
		echo'
				<div class="table-responsive">
				<table id="table" class="table table-striped table-sm">
				<thead>;
				<tr>;
			';
		
		//The foreach is used to iterate the header for the <th></th> tag.
		
		foreach($cell as $cell => $head)
		{
			echo '<th>'.$head.'</th>';
		}
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		foreach($records as $records => $data)
		{
			echo '<tr>';  
				echo '<td>'.$data["first_name"].'</td>';
				echo '<td>'.$data["last_name"].'</td>';
				echo "<td><a style='color: blue;' href=\"mailto:".$data['email_address']."\">".$data['email_address']."</a></td>";
				echo '<td>'.$data["occupation"].'</td>';
				echo '<td>'.$data["job_title"].'</td>';
				echo '<td>'.$data["street"].'</td>';
				echo '<td>'.$data["city"].'</td>';
				echo '<td>'.$data["province"].'</td>';

				echo '<td>
						<form class="form-update" method="post">
							<div>
								<label for = "first_name">First Name</label>
								<input type="text" name="first_name" value="">
								
								<label for = "last_name">Last Name</label>
								<input type="text" name="last_name" value="">
								
								<label for = "email">Email Address</label>
								<input type="text" name="email" value="">
								
								<label for = "occupation">Occupation</label>
								<input type="text" name="occupation" value="">
								
								<label for = "job_title">Job Title</label>
								<input type="text" name="job_title" value="">
								
								<label for = "street">Street</label>
								<input type="text" name="street" value="">
								
								<label for = "city">City</label>
								<input type="text" name="city" value="">
								
								<label for = "province">Provice</label>
								<input type="text" name="province" value="">
								
							</div>
							<div>
								<button type="submit" name="update">Update</button>
							</div>
						</form>
					';
				echo '</td>';
			echo '</tr>';			 		
		}
		
		echo '</table>';
		
		echo "<script>";
		echo "$(document).ready(function(){ $('#table').dataTable(); });";
		echo "</script>";
		
	}

	function showings_table($cell , $records)
	{
		//echoing the table
		echo'
				<div class="table-responsive">
				<table id="table" class="table table-striped table-sm">
				<thead>;
				<tr>;
			';
		
		//The foreach is used to iterate the header for the <th></th> tag.
		
		foreach($cell as $cell => $head)
		{
			echo '<th>'.$head.'</th>';
		}
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		foreach($records as $records => $data)
		{
			echo '<tr>';  
			echo '<td>'.$data["first_name"].'</td>';
			echo '<td>'.$data["last_name"].'</td>';
			echo '<td>'.$data["showing_date"].'</td>';
			echo '<td>'.$data["property_address"].'</td>';
			echo '<td>'.$data["showing_time"].'</td>';
			echo '<td>'.$data["note"].'</td>';						 		
		}
		
		echo '</table>';
		
		echo "<script>";
		echo "$(document).ready(function(){ $('#table').dataTable(); });";
		echo "</script>";
		
	}

	
	function events_table($cell, $records)
	{
		//echoing the table
		echo'
				<div class="table-responsive">
				<table id="table" class="table table-striped table-sm">
				<thead>;
				<tr>;
			';
		// The foreach is used to iterate the header for the <th></th> tag.
		foreach($cell as $cell => $head)
		{
			echo '<th>'.$head.'</th>';
		}
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';

		//made a form for the records to be submitted.
		foreach($records as $key => $data)
		{
			$is_active = "";
			if($data["event_status"] == true)
			{
				$is_active = "Active";
			}
			else
			{
				$is_active = "In-Active";
			}
			echo '<tr>';
				echo '<td>'.$data["events"].'</td>';
				echo '<td>'.$data["event_date"].'</td>';
				echo '<td>'.$is_active.'</td>';
				//echo '<td>'.$data["links"].'</td>';
			echo '</tr>';
		}

		echo '</table>';
		echo "<script>";
		echo "$(document).ready(function(){ $('#table').dataTable(); });";
		echo "</script>";

	}

	function client_birthday_table($cell , $records)
	{
		//echoing the table
		echo'
				<div class="table-responsive">
				<table id="table" class="table table-striped table-sm">
				<thead>;
				<tr>;
			';
		
		//The foreach is used to iterate the header for the <th></th> tag.
		
		foreach($cell as $cell => $head)
		{
			echo '<th>'.$head.'</th>';
		}
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		foreach($records as $records => $data)
		{
			echo '<tr>';  
			echo '<td>'.$data["client_first_name"].'</td>';
			echo '<td>'.$data["client_last_name"].'</td>';
			echo '<td>'.$data["reminder_date"].'</td>';
			echo '<td>'.$data["subject_line"].'</td>';
			echo '<td>'.$data["body"].'</td>';
				
			echo '</tr>';			 		
		}
		
		echo '</table>';
		
		echo "<script>";
		echo "$(document).ready(function(){ $('#table').dataTable(); });";
		echo "</script>";
		
	}

	function monthly_enewsletter($cell , $records)
	{
		//echoing the table
		echo'
				<div class="table-responsive">
				<table id="table" class="table table-striped table-sm">
				<thead>;
				<tr>;
			';
		
		//The foreach is used to iterate the header for the <th></th> tag.
		
		foreach($cell as $cell => $head)
		{
			echo '<th>'.$head.'</th>';
		}
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		foreach($records as $records => $data)
		{
			echo '<tr>';  
			echo '<td>'.$data["client_first_name"].'</td>';
			echo '<td>'.$data["client_last_name"].'</td>';
			echo '<td>'.$data["reminder_date"].'</td>';
			echo '<td>'.$data["subject_line"].'</td>';
			echo '<td>'.$data["body"].'</td>';
				
			echo '</tr>';			 		
		}
		
		echo '</table>';
		
		echo "<script>";
		echo "$(document).ready(function(){ $('#table').dataTable(); });";
		echo "</script>";
		
	}

	function move_in_anniversary_table($cell , $records)
	{
		//echoing the table
		echo'
				<div class="table-responsive">
				<table id="table" class="table table-striped table-sm">
				<thead>;
				<tr>;
			';
		
		//The foreach is used to iterate the header for the <th></th> tag.
		
		foreach($cell as $cell => $head)
		{
			echo '<th>'.$head.'</th>';
		}
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		foreach($records as $records => $data)
		{
			echo '<tr>';  
			echo '<td>'.$data["client_first_name"].'</td>';
			echo '<td>'.$data["client_last_name"].'</td>';
			echo '<td>'.$data["reminder_date"].'</td>';
			echo '<td>'.$data["subject_line"].'</td>';
			echo '<td>'.$data["body"].'</td>';
				
			echo '</tr>';			 		
		}
		
		echo '</table>';
		
		echo "<script>";
		echo "$(document).ready(function(){ $('#table').dataTable(); });";
		echo "</script>";
		
	}
	
	function calls_list_table($cell , $records)
	{
		//echoing the table
		echo'
				<div class="table-responsive">
				<table id="table" class="table table-striped table-sm">
				<thead>;
				<tr>;
			';
		
		//The foreach is used to iterate the header for the <th></th> tag.
		
		foreach($cell as $cell => $head)
		{
			echo '<th>'.$head.'</th>';
		}
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		foreach($records as $records => $data)
		{
			echo '<tr>';  
			echo '<td>'.$data["first_name"].'</td>';
			echo '<td>'.$data["last_name"].'</td>';
			//echo '<td>'.$data["email_address"].'</td>';
			echo '<td>'.$data["business_phone"].'</td>';
			echo '<td>'.$data["home_phone"].'</td>';
			echo '<td>'.$data["mobile_phone"].'</td>';
			echo '<td>'.$data["call_note"].'</td>';
			//echo '<td>'.$data["body"].'</td>';
				
			echo '</tr>';			 		
		}
		
		echo '</table>';
		
		echo "<script>";
		echo "$(document).ready(function(){ $('#table').dataTable(); });";
		echo "</script>";
		
	}

	function questionaire_form_table($cell , $records)
	{
		//echoing the table
		echo'
				<div class="table-responsive">
				<table id="table" class="table table-striped table-sm">
				<thead>;
				<tr>;
			';
		
		//The foreach is used to iterate the header for the <th></th> tag.
		
		foreach($cell as $cell => $head)
		{
			echo '<th>'.$head.'</th>';
		}
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		foreach($records as $records => $data)
		{
			echo '<tr>';  
				echo '<td>'.$data["first_name"].'</td>';
				echo '<td>'.$data["last_name"].'</td>';
				echo '<td>'.$data["price_start"].'</td>';
				echo '<td>'.$data["price_end"].'</td>';
				echo '<td>'.$data["property_type"].'</td>';
				echo '<td>'.$data["client_type"].'</td>';
				echo '<td>'.$data["property_detail"].'</td>';
				echo '<td>'.$data["bed_rooms"].'</td>';
				echo '<td>'.$data["parking"].'</td>';
				echo '<td>'.$data["garage"].'</td>';
				echo '<td>'.$data["additional_notes"].'</td>';
				echo '<td>'.$data["choice"].'</td>';
				echo '<td>'.$data["question_one"].'</td>';
				echo '<td>'.$data["question_two"].'</td>';
				echo '<td>'.$data["question_three"].'</td>';
				echo '<td>'.$data["question_four"].'</td>';
				
			echo '</tr>';			 		
		}
		
		echo '</table>';
		
		echo "<script>";
		echo "$(document).ready(function(){ $('#table').dataTable(); });";
		echo "</script>";
		
	}

	
?>