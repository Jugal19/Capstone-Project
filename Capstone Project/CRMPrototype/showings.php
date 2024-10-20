<?php
    $title = "Showings";
    require_once "includes/header.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        //$id = "";
        $first_name = "";
        $last_name = "";
        $showing_date = "";
        $property_address = "";
        $showing_time = "";
        $note = "";
    }
    else
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            //$id = trim($_POST["id"]);
            $first_name = trim($_POST["first_name"]);
            $last_name = trim($_POST["last_name"]);
            $showing_date = trim($_POST["showing_date"]);
            $property_address = trim($_POST['property_address']);
            $showing_time = trim($_POST['showing_time']);
            $note = trim($_POST['note']);

            /**
             * Validations:
             */
            /*
            if($id == false)
            {
                setMessage("This Field needs to be kept blank!");
            }
            */

            if($first_name == false)
            {
                setMessage("The First Name you have entered is a valid name!");
            }
            else
            {
                setMessage("The Firs Name you have entered is not a valid name!");
            }

            if($last_name == false)
            {
                setMessage("The Last Name you have entered is Valid");
            }
            else
            {
                setMessage("The Last Name you have entered is not valid!");
            }

            if($showing_date == false)
            {
                setMessage("The date you have picked is valid!");
            }
            else
            {
                setMessage("Please choose a date as it cannot be left blank");
            }

            if($property_address == false)
            {
                setMessage("The Property Name you have Entered is Valid!");
            }
            else
            {
                setMessage("The Property Name You Have Entered is Not Valid!");
            }

            if($showing_time == false)
            {
                setMessage("The Time You Have Picked Is Valid!");
            }
            else
            {
                setMessage("Please Choose A Valid Time As It Cannot Be Left Blank");
            }

            if($note == false)
            {
                setMessage("The Notes you have entered is valid!");
            }
            else
            {
                setMessage("The Notes you have entered is not Valid, Please Try Again!");
            }
        }

        // Connection to the database:
        pg_query(db_connect(), "INSERT INTO Showings (first_name, last_name, showing_date, 
                                property_address, showing_time, note) VALUES (
            '$first_name',
            '$last_name', '$showing_date', '$property_address', '$showing_time', '$note');");

    }
?>

    <h3><?php echo $message; ?></h3>

    <div style="margin-left:auto; margin-right:auto;">
        
        <form class="form-clients" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
                            "label" => "ID",
                            "readonly" => "readonly"
                        ),
                        */
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
                            "type" => "date",
                            "name" => "showing_date",
                            "value" => "$showing_date",
                            "label" => "Showing Date"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "property_address",
                            "value" => "$property_address",
                            "label" => "Property Address" 
                        ),
                        array
                        (
                            "type" => "time",
                            "name" => "showing_time",
                            "value" => "$showing_time",
                            "label" => "Showing Time"
                        ),
                        array
                        (
                            "type" => "text",
                            "name" => "note",
                            "value" => "$note",
                            "label" => "Notes"
                        )
                    )
                );
            ?>
        </form>
        <?php
            showings_table(
                array(
                    "first_name" => "First Name",
                    "last_name" => "Last Name",
                    "showing_date" => "Showing Date",
                    "property_address" => "Property Address",
                    "showing_time" => "Showing Time",
                    "note" => "note"
                ),
                showings_list_select_all_stmt()
            )
        ?>
    </div>

    <div style="margin-left:auto; margin-right:auto;">
<?php
    include "includes/footer.php"
?>
</div>