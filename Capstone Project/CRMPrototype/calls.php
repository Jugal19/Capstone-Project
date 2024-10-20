<?php
    $title = "Calls List";
    include ("./includes/header.php");
?>

    <div style="margin-left:auto; margin-right:auto;">
        <button onclick="location.href='./calls_form.php'" type="button">Open Calls Form</button>
        <!--<button onclick="location.href='./update_contact_list.php'" type="button">Open Update Contact List</button>-->
        <br>
        <br>
        <?php echo $message; ?>
        <?php
            
            calls_list_table(
                array(
                    "first_name" => "First Name",
                    "last_name" => "Last Name",
                    //"email" => "Email Address",
                    "business_phone" => "Business Phone",
                    "home_phone" => "Home Phone",
                    "mobile_phone" => "Mobile Phone",
                    "note" => "Call Notes"
                ),
                //contact_list_select_all(), 
                call_list_select_all()
            );                   
        ?>
    </div>

<div style="margin-left:auto; margin-right:auto;">
    <?php
        include "./includes/footer.php"
    ?>
</div>