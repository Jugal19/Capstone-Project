<?php
    $title = "Main Client Birthday";
    require_once "./includes/header.php";
?>

<div style="margin-left:auto; margin-right:auto;">
        <button onclick="location.href='./main_client_birthday_form.php'" 
            type="button">Open Client Birthday Form</button>
        <br>
        <br>
        <?php
            
            client_birthday_table(
                array(
                    "client_first_name" => "First Name",
                    "client_last_name" => "Last Name",
                    "reminder_date" => "Reminder Date",
                    "subject_line" => "Subject Line",
                    "body" => "Body"
                ),
                client_birthday_select_all()
            );                    
        ?>
    </div>

<div style="margin-left:auto; margin-right:auto;">
<?php
    require_once "./includes/footer.php"
?>
</div>