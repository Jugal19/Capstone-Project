<?php
    $title = "Move In Anniversary";
    require_once "./includes/header.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $first_name = "";
        $last_name = "";
        $date = "";
        $subject_line = "";
        $body = "";
    }
    else
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $first_name = trim($_POST["first_name"]);
            $last_name = trim($_POST["last_name"]);
            $date = trim($_POST["reminder_date"]);
            $subject_line = trim($_POST["subject_line"]);
            $body = trim($_POST["body"]);
        

            if($first_name == false)
            {
                setMessage("The first name you have entered is valid!");
            }
            else
            {
                setMessage("Cannot leave the field blank. Please Try Again!");
            }

            if($last_name == false)
            {
                setMessage("The last name you have selected is valid!");
            }
            else
            {
                setMessage("Cannot leave the field blank. Please Try Again!");
            }
            
            if($date == false)
            {
                setMessage("The date you have picked is valid!");
            }            
            else
            {
                setMessage("Please pick the date, you can't skip this field!");
            }

            if($subject_line == false)
            {
                setMessage("The subject line you have entered is valid!");
            }            
            else
            {
                setMessage("Cannot leave this field blank. Please Enter something here!");
            }

            if($body == false)
            {
                setMessage("The body you have entered is valid");
            }
            else
            {
                setMessage("Cannot leave this field blank Please Enter something here!");
            }
        }
       
        // Connect to the database:
        pg_query(db_connect(), "INSERT INTO move_in_anniversary (client_first_name, 
            client_last_name, reminder_date, subject_line, body) VALUES
        ('$first_name', '$last_name', '$date', '$subject_line', '$body');");

    }

?>

<div style="margin-left:auto; margin-right:auto;">
        <button onclick="location.href='./move_in_anniversary.php'" 
            type="button">Close Move In Anniversary Form</button>
        <br>
        <br>

        <form class="newClients" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
            <?php
                
                display_form(
                    array(
                        array(
                            "type" => "text",
                            "name" => "first_name",
                            "value" => "$first_name",
                            "label" => "Client First Name"
                        ),
                        array(
                            "type" => "text",
                            "name" => "last_name",
                            "value" => "$last_name",
                            "label" => "Client Last Name"
                        ),
                        array(
                            "type" => "date",
                            "id" => "start",
                            "name" => "reminder_date",
                            "value" => "",
                            "min" => "",
                            "max" => "",
                            "label" => "Reminder"
                        ),
                        array(
                            "type" => "text",
                            "name" => "subject_line",
                            "value" => "$subject_line",
                            "label" => "Subject Line"
                        ),
                        array(
                            "type" => "text",
                            "name" => "body",
                            "value" => "$body",
                            "label" => "Body"
                        )                    
                    )                
                );
                    
            ?>

        </form>
    </div>

<?php
    require_once "./includes/footer.php"
?>