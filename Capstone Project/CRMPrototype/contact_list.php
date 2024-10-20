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
            
            client_list_table(
                array(
                    "first_name" => "First Name",
                    "last_name" => "Last Name",
                    "email" => "Email Address",
                    "occupation" => "Occupation",
                    "job_title" => "Job Title",
                    //"source_of_contact" => "Source Of Contact",
                    //"business_phone" => "Business Phone",
                    //"home_phone" => "Home Phone",
                    //"mobile_phone" => "Mobile Phone",
                    //"fax_num" => "Fax Num",
                    "street" => "Street",
                    "city" => "City",
                    "province" => "Province",
                    "update" => "Update Information"
                    //"zip_code" => "Zip Code",
                    //"notes" => "Notes"
                ),
                contact_list_select_all()
            );           
                    
        ?>
    </div>

<div style="margin-left:auto; margin-right:auto;">
    <?php
        include "./includes/footer.php"
    ?>
</div>


