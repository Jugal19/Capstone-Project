<?php
    $title = "Contact List";
    include ("./includes/header.php");
?>

    <div style="margin-left:auto; margin-right:auto;">
        <button onclick="location.href='./contact_form.php'" type="button">Open Contact Form</button>
        <!--<button onclick="location.href='./update_contact_list.php'" type="button">Open Update Contact List</button>-->
        <br>
        <br>
        <?php echo $message; ?>
        <?php
            
            questionaire_form_table(
                array(
                    "first_name" => "First Name",
                    "last_name" => "Last Name",
                    "price_start" => "Price Start",
                    "price_end" => "Price End",
                    "property_type" => "Property Type",
                    "client_type" => "Property Type",
                    "property_detail" => "Property Type",
                    "bed_rooms" => "Number of Bed Rooms",
                    "parking" => "Car Parking",
                    "garage" => "Do you need Garage?",
                    "additional_notes" => "Additional Notes",
                    "choice" => "Area of Choice?",
                    "question_one" => "What makes you to ook for it now?",
                    "question_two" => "Are you renting now?",
                    "question_three" => "Are you on contract on rent?",
                    "question_four" => "When is it ending?"
                ),
                questionaire_list_select_all()
            );           
                    
        ?>
    </div>

<div style="margin-left:auto; margin-right:auto;">
    <?php
        include "./includes/footer.php"
    ?>
</div>


