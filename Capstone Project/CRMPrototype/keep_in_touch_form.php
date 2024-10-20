<?php
    $title = "Keep In Touch Form";
    require_once "./includes/header.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $events = "";
        $date = "";
        $status = "";
    }
    else
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $events = trim($_POST["events"]);
            $date = trim($_POST["date"]);
            $status = $_POST["status"];
        

            if($events == false)
            {
                setMessage("The event you have entered is valid!");
            }
            else
            {
                setMessage("The event you have entered is invalid! Please type monthly e-newsletter, client birthday
                , Move in Anniverssary, Annual Keep in Touch, Semi Annual, Quartarly, Monthly Keep in Touch, or By Weekly!");
            }

            if($date == false)
            {
                setMessage("The date you have selected is valid!");
            }
            else
            {
                setMessage("Please select a date to submit the form!");
            }

           /* 
            if($status == false)
            {
                setMessage("The status you have entered is valid!");
            }
            else
            {
                setMessage("Please select either Active or disActive");
            }
            */
            
        }
       
        // Connect to the database:
        pg_query(db_connect(), "INSERT INTO Events (events, event_date, event_status) VALUES
        ('$events', '$date', '$status');");

    }

?>
    <h3><?php echo $message; ?></h3>

    <div style="margin-left:auto; margin-right:auto;">
        <button onclick="location.href='./keep_in_touch.php'" type="button">Close Keep In Touch Form</button>
        <br>
        <br>
        <form class="form-keep-in-touch" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <?php
                display_form(
                
                    array(
                        array(
                            "type" => "text",
                            "name" => "events",
                            "value" => $events,
                            "label" => "Events"
                        ),
                        array(
                            "type" => "date",
                            "id" => "start",
                            "name" => "date",
                            "value" => "",
                            "min" => "",
                            "max" => "",
                            "label" => "Event Date"
                        ),
                        array(
                            "type" => "radio",
                            "id" => "isActive",
                            "name" => "status",
                            "value" => "true",
                            "label" => "Active",
                            "checked"
                        ),
                        array(
                            "type" => "radio",
                            "id" => "isActive",
                            "name" => "status",
                            "value" => "false",
                            "label" => "In-Active"
                        )
                    )
                );
                
            ?>
            
        </form>
    </div>

<?php
    include "./includes/footer.php";
?>