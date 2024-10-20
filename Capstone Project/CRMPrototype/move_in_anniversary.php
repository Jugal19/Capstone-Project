<?php
    $title = "Main Client Birthday";
    require_once "./includes/header.php";
?>

<div style="margin-left:auto; margin-right:auto;">
        <button onclick="location.href='./move_in_anniversary_form.php'" type="button">Open Move-In Anniversary Form</button>
        <br>
        <br>
        <?php
            
            move_in_anniversary_table(
                array(
                    "first_name" => "First Name",
                    "last_name" => "Last Name",
                    "reminder_date" => "Reminder Date",
                    "subject_line" => "Subject",
                    "body" => "Body"
                ),
                move_in_anniversary_select_all()
                
            );           
                    
        ?>
    </div>
    <div style="margin-left:auto; margin-right:auto;">
<?php
    require_once "./includes/footer.php"
?>
</div>