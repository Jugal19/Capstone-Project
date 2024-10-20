<?php
    $title = "Calendar Form";
    require_once("./includes/header.php");
    

    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        //$id = "";
        $client_first_name = "";
        $client_last_name = "";
        $client_email_address = "";
        $note = "";
        $reminder_date = ""; 
    }
    else
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            //$id = trim($_POST["id"]);
            $client_first_name = trim($_POST["client_first_name"]);
            $client_last_name = trim($_POST["client_last_name"]);	
            $client_email_address = trim($_POST["client_email"]);
            $note = trim($_POST["note"]);
            $reminder_date = trim($_POST["reminder_date"]);

            if($client_first_name == !false)
            {
                setMessage("The first name you have entered is valid");
            }
            else
            {
                setMessage("the first name you have entered is not valid. Please Try Again!");
            }

            //Validation for Last Name
            if($client_last_name == !false)
            {
                setMessage("The first name you have entered is valid");
            }
            else
            {
                setMessage("the first name you have entered is not valid. Please Try Again!");
            }

            //Validation for Email Address
            if($client_email_address == !false)
            {
                setMessage("The email address you have entered is valid");
            }
            else
            {
                setMessage("The email address you have entered is not valid");
            }

            //Validation for Note
            if($note == !false)
            {
                setMessage("The note you have entered is valid");
            }
            else
            {
                setMessage("The not you have entered is invalid");
            }

            //Validation for Date
            if($reminder_date == !false)
            {
                setMessage("The date you have picked is valid");
            }
            else
            {
                setMessage("Please select the date! It cannot be left blanked");
            }
        }

        pg_query(db_connect(), "INSERT INTO Calendar (client_first_name, client_last_name, client_email_address, note, reminder_date) VALUES (
        
        '$client_first_name',
        
        '$client_last_name', '$client_email_address', '$note', '$reminder_date');");
    }
    
?>

    <div style="margin-left:auto; margin-right:auto;">

        <button onclick="location.href='./calendar.php'" type="button">Close Calendar Form</button>
        <br>
        <br>

        <form class="newClients" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">

            <?php
                display_form
                (
                    array
                    (
                        /*
                        array
                        (
                            "type" => "number",
                            "name" => "id",
                            "value" => "$id",
                            "label" => "Client id"
                        ),*/
                        
                        array
                        (
                                "type" => "text",
                                "name" => "client_first_name",
                                "value" => "$client_first_name",
                                "label" => "Client First Name"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "client_last_name",
                            "value" => "$client_last_name",
                            "label" => "Client Last Name"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "client_email",
                            "value" => "$client_email_address",
                            "label" => "Client Email Address"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "note",
                            "value" => "$note",
                            "label" => "Note"
                        ),
                        array
                        (
                            "type" => "date",
                            "id" => "start",
                            "name" => "reminder_date",
                            "value" => "",
                            "min" => "",
                            "max" => "",
                            "label" => "Reminder"
                        ),
                    )
                );
                
            ?>
    
        </form>
    </div>
<?php

    include "./includes/footer.php";

?>