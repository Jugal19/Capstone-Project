<?php
    /**
	 * 
	 *
	 * PHP version 7.1
	 *
	 * @author     Jugal Patel <jugal.patel1@dcmail.ca>
	 * @version    1.0  (January/20th/2022)
	*/

    $title = "Contact Form";
    require ("./includes/header.php");

    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $first_name = "";
        $last_name = "";
        $email = "";
        $occupation = "";
        $job_title = "";
        $source_of_contact = "";
        $business_phone = "";
        $home_phone = "";
        $mobile_phone = "";
        $fax_num = "";
        $street_num = "";
        $street = "";
        $city = "";
        $province = "";
        $zip_code = "";
        $notes = "";
    }
    else
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $first_name = trim($_POST["first_name"]);
            $last_name = trim($_POST["last_name"]);
            $email = trim($_POST["email"]);
            $occupation = trim($_POST["occupation"]);
            $job_title = trim($_POST["job_title"]);
            $source_of_contact = trim($_POST["source_of_contact"]);
            $business_phone = trim($_POST["business_phone"]);
            $home_phone = trim($_POST["home_phone"]);
            $mobile_phone = trim($_POST["mobile_phone"]);
            $fax_num = trim($_POST["fax_num"]);
            $street_num = trim($_POST["street_num"]);
            $street = trim($_POST["street"]);
            $city = trim($_POST["city"]);
            $province = trim($_POST["province"]);
            $zip_code = trim($_POST["zip_code"]);
            $notes = trim($_POST["notes"]);
        
            //$first_name = "";
            if($first_name == false)
            {
                setMessage("The first name you have entered is valid");
            }
            else
            {
                setMessage("The first name you have entered is not valid. Please Try Again!");
            }
            //$last_name = "";
            if($last_name == false)
            {
                setMessage("The last name you have entered is valid");
            }
            else
            {
                setMessage("The last name you have entered is not valid. Please Try");
            }
            //$email = "";
            if($email == false)
            {
                setMessage("The email address you have entered is valid!");
            }
            else
            {
                setMessage("The email address you have entered is invalid!");
            }
            //$company = "";
            if($occupation == false)
            {
                setMessage("The company name you have entered is valid!");
            }
            else
            {
                setMessage("The company name you have entered is not valid! Please Try Again!");
            }
            //$job_title = "";
            if($job_title == false)
            {
                setMessage("The job title you have entered is valid");
            }
            else
            {
                setMessage("The job title you have entered is not valid! Please Try Again!");
            }
            //$source_of_contact = "";
            if($source_of_contact == false)
            {
                setMessage("The source of contact you have entered is valid");
            }
            else
            {
                setMessage("The source of contact you have enteres is not valid! Please Try Again!");
            }
            //$business_phone = "";
            if($business_phone == false)
            {
                setMessage("The business phone you have entered is valid!");
            }
            else
            {
                setMessage("The business phone you have entered is not valid! Please enter long digit number!");
            }
            //$home_phone = "";
            if($home_phone == false)
            {
                setMessage("The home phone you have entered is valid!");
            }
            else
            {
                setMessage("The home phone you have enteres is not valid! Please enter a long digit number!");
            }
            //$mobile_phone = "";
            if($mobile_phone == false)
            {
                setMessage("The mobile phone you have entered is valid!");
            }
            else
            {
                setMessage("The mobile phone you have enteres is not valid! Please enter a long digit number!");
            }
            //$fax_num = "";
            if($fax_num == false)
            {
                setMessage("The fax num you have entered is valid!");
            }
            else
            {
                setMessage("The fax num you have enteres is not valid! Please enter a long digit number!");
            }

            if($street_num == false)
            {
                setMessage("The street num you have entered is valid!");
            }
            else
            {
                setMessage("The street num you have enteres is not valid! Please enter a long digit number!");
            }
            //$street = "";
            if($street == false)
            {
                setMessage("The street name you have entered is valid!");
            }
            else
            {
                setMessage("The street name you have entered is invalid! Please Try Again!");
            }
            //$city = "";
            if($city == false)
            {
                setMessage("The city name you have entered is valid!");
            }
            else
            {
                setMessage("The city name you have entered is invalid!");
            }
            //$province = "";
            if($province == false)
            {
                setMessage("The province you have entered is valid!");
            }
            else
            {
                setMessage("The province you have entered is invalid!");
            }
            //$zip_code = "";
            if($zip_code == false)
            {
                setMessage("The zip code you have entered is valid!");
            }
            else
            {
                setMessage("The zip code you have entered is invalid!");
            }
            
            //$notes = "";
            if($notes == false)
            {
                setMessage("The notes you have entered are completed successfully!");
            }
            else
            {
                setMessage("The notes you have entered aren't valid!");
            }
        }
        
        //Connect to the database:
        pg_query(db_connect(), "INSERT INTO Contacts (first_name, last_name, email_address, occupation, 
                                            job_title, source_of_contact, business_phone, home_phone, 
                                            mobile_phone, fax_num, street_num,street, city, province, zip_code, notes) VALUES (
            '$first_name','$last_name', '$email', '$occupation','$job_title',
             '$source_of_contact', '$business_phone',
            '$home_phone', '$mobile_phone', '$fax_num', '$street_num' , '$street', '$city', 
            '$province', '$zip_code', 
            '$notes');");
    }
?>
    <h3><?php echo $message; ?></h3>

    <div style="margin-left:auto; margin-right:auto;">
        <button onclick="location.href='./contact_list.php'" type="button">Close Contact Form</button>
        <br>
        <br>

        <form class="form-clients" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <?php
                display_form(
                    array(
                        array(
                            "type" => "text",
                            "name" => "first_name",
                            "value" => $first_name,
                            "label" => "First Name"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "last_name",
                            "value" => $last_name,
                            "label" => "Last Name"
                        ),
                        array
                        (
                            "type" => "text",               
                            "name" => "email",
                            "value" => $email,
                            "label" => "Email"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "occupation",
                            "value" => $occupation,
                            "label" => "Occupation"
                        ),
                        array 
                        (
                            "type" => "text",
                            "name" => "job_title",
                            "value" => $job_title,
                            "label" => "Job Title"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "source_of_contact",
                            "value" => $source_of_contact,
                            "label" => "Source of Contact"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "business_phone",
                            "value" => $business_phone,
                            "label" => "Business Phone"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "home_phone",
                            "value" => $home_phone,
                            "label" => "Home Phone"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "mobile_phone",
                            "value" => $mobile_phone,
                            "label" => "Mobile Phone"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "fax_num",
                            "value" => $fax_num,
                            "label" => "Fax Number"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "street_num",
                            "value" => $street_num,
                            "label" => "Street Number"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "street",
                            "value" => $street,
                            "label" => "Street Name"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "city",
                            "value" => $city,
                            "label" => "City"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "province",
                            "value" => $province,
                            "label" => "Province"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "zip_code",
                            "value" => $zip_code,
                            "label" => "Zip Code"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "notes",
                            "value" => $notes,
                            "label" => "Notes"
                        )
                    )
                );
            ?>          
        </form> 
    </div>    
        
<?php
    include "./includes/footer.php";
?>