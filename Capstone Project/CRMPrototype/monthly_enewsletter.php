<?php
    $title = "E-Newsletter";
    require_once "./includes/header.php";
?>

<div style="margin-left:auto; margin-right:auto;">
        <button onclick="location.href='./monthly_enewsletter_form.php'" type="button">Open Monthly Enewsletter Form</button>
        <br>
        <br>
        <?php
            //$recipients= contact_list_select_all();
            monthly_enewsletter(
                array(
                    "first_name" => "First Name",
                    "last_name" => "Last Name",
                    "reminder_date" => "Reminder Date",
                    "subject_line" => "Subject",
                    "body" => "body"

                    //"email_address" => "Email Address",
                ),

                monthly_enewsletter_select_all()
                
                //$recipients
                
            );           
                    
        ?>
    </div>

<?php
    require_once "./includes/footer.php"
?>