<?php
    $title = "Call Form";
    require_once("./includes/header.php");
    

    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        //$id = "";
        $first_name = "";
        $last_name = "";
        $business_phone = "";
        $home_phone = "";
        $mobile_phone = "";
        $call_date = "";
        $call_time = "";
        $call_note = ""; 
    }
    else
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            //$id = trim($_POST["id"]);
            $first_name = trim($_POST["first_name"]);
            $last_name = trim($_POST["last_name"]);
            $business_phone = trim($_POST["business_phone"]);
            $home_phone = trim($_POST["home_phone"]);
            $mobile_phone = trim($_POST["mobile_phone"]);
            $call_date = trim($_POST["call_date"]);
            $call_time = trim($_POST["call_time"]);
            $call_note = trim($_POST["call_note"]);
            
            //Validation for Note
            if($first_name ==!false)
            {
                setMessage("The name you have entered is valid");
            }
            else
            {
                setMessage("The name you have entered is invalid and can't be left blank");
            }

            if($last_name ==!false)
            {
                setMessage("The last name you have entered is valid");
            }
            else
            {
                setMessage("The last name you have entered is invalid and can't be left blank");
            }

            if($home_phone ==!false)
            {
                setMessage("The phone number you have entered is valid");
            }
            else
            {
                setMessage("The phone number you have entered is invalid, and can't be left blank");
            }

            if($mobile_phone ==!false)
            {
                setMessage("The phone number you have entered is valid");
            }
            else
            {
                setMessage("The phone number you have entered is invalid, and can't be left blank");
            }

            if($business_phone ==!false)
            {
                setMessage("The phone number you have entered is valid");
            }
            else
            {
                setMessage("The phone number you have entered is invalid, and can't be left blank");
            }

            if($call_date == !false)
            {
                setMessage("The note you have entered is valid");
            }
            else
            {
                setMessage("Please choose the date!");
            }

            if($call_time == !false)
            {
                setMessage("The time you have entered is valid");
            }
            else
            {
                setMessage("Please choose the time!");
            }

            if($call_note == !false)
            {
                setMessage("The note you have entered is valid");
            }
            else
            {
                setMessage("The not you have entered is invalid");
            }
        }

        pg_query(db_connect(), "INSERT INTO Calls (first_name, last_name, business_phone, home_phone, mobile_phone,call_date,
        call_time,call_note) VALUES ('$first_name', '$last_name', '$business_phone', '$home_phone', '$mobile_phone', 
        '$call_date', '$call_time', '$call_note');");
    }
    
?>

    <div style="margin-left:auto; margin-right:auto;">

        <button onclick="location.href='./calls.php'" type="button">Close Call Form</button>
        <br>
        <br>

        <form class="calls" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">

            <?php
                display_form
                (
                    array
                    (
                        array
                        (
                            "type" => "text",
                            "name" => "first_name",
                            "value" => "$first_name",
                            "label" => "First Name"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "last_name",
                            "value" => "$last_name",
                            "label" => "Last Name"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "business_phone",
                            "value" => "$business_phone",
                            "label" => "Business Phone"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "home_phone",
                            "value" => "$home_phone",
                            "label" => "Home Phone"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "mobile_phone",
                            "value" => "$mobile_phone",
                            "label" => "Mobile Phone"
                        ),
                        array
                        (
                            "type" => "date",
                            "name" => "call_date",
                            "value" => "$call_date",
                            "label" => "Call Date"
                        ),
                        array
                        (
                            "type" => "time",
                            "name" => "call_time",
                            "value" => "$call_time",
                            "label" => "Call Time"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "call_note",
                            "value" => "$call_note",
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