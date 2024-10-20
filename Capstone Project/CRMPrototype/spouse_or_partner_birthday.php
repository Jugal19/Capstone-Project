<?php
    $title = "Main Client Birthday";
    require_once "./includes/header.php";
?>

<div style="margin-left:auto; margin-right:auto;">
        <button onclick="location.href='./contact_form.php'" type="button">Open Contact Form</button>
        <br>
        <br>
        <?php
            
            birthday_table(
                array(
                    "first_name" => "First Name",
                    "last_name" => "Last Name",
                    "email_address" => "Email Address",
                ),
                contact_list_select_all()
                
            );           
                    
        ?>
    </div>

<?php
    require_once "./includes/footer.php"
?>