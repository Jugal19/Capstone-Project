<?php

    $title = "Keep In Touch"; 
	require_once "./includes/header.php";
?>

    <div style="margin-left:auto; margin-right:auto;">
        <!--
        <button onclick="location.href='./keep_in_touch_form.php'" type="button">Open Keep In Touch Form</button>
        <br>
        <br>
        -->
        <?php
            events_table(
                array(
                    "events" => "Events",
                    "date" => "Date",
                    "event_status" => "Status",
                    //"links" => "Links"
                ),
                events_select_all_stmt()
            );
        ?>
    </div>

    <div style="margin-left:auto; margin-right:auto;">
<?php
    include "./includes/footer.php"
?>
</div>