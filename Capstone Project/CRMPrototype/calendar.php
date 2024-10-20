<?php
    $title = "Calendar";
    include "./includes/header.php";
    
    
?>

    <button onclick="location.href='./calendar_form.php'" type="button">Open Calendar Form</button>
    <?php

        /**
         * Variable Declaration:
         */
        $current_month = date("n"); //n = 1-12 months or numerical value of the current month. 
        $current_year = date("Y"); // Y= number of years or numerical value of the current year.

        $next_month = date("n"); // this is the month of the next month in series.
        $next_year = date("Y"); // this is the year of the next month in series

        $prev_month = date("n"); // this is the month of the previous month in series.
        $prev_year = date("Y"); // this is the year of the previous month in series

        /**
         * This will get the url parameters for the year and month
         */
        if (isset($_GET["year"]))
        {
            $current_year = $_GET["year"];
        }
        else
        {
            $current_year = date("Y");
        }

        if (isset($_GET["month"]))
        {
            $current_month = $_GET["month"];
        }
        else
        {
            $current_month = date("n");
        }

        if($current_month == 12)
        {
            $next_month = 1; 
            $next_year = $current_year + 1;  
        }
        else
        {
            $next_month = $current_month + 1;
            $next_year = $current_year;
        }

        if($current_month == 1)
        {
            $prev_month = 12; 
            $prev_year = $current_year - 1;  
        }
        else
        {
            $prev_month = $current_month - 1;
            $prev_year = $current_year;
        }

        $day_first_date_of_month = date("w", mktime(0, 0, 0, $current_month, 1, $current_year)); // number of value for day of the week (Sun - Sat) ,first day of the month.
        $days_in_current_month = date("t", mktime(0, 0, 0, $current_month, 1, $current_year)); // total of number of days in a month. 
        $day_last_date_of_month = date("w", mktime(0, 0, 0, $current_month, $days_in_current_month, $current_year)); // total days of the month

        $calendar_rows_count = ceil(($day_first_date_of_month + $days_in_current_month) / 7); // 

        /**
         * Echoing the days to help me understand how to create the columns 
         */
        //echo "First day: ". $day_first_date_of_month . " last day: " . $day_last_date_of_month . " total days: " . $days_in_current_month . "<br/>";

        $table = "\n<table width='100%' border='1'>";

        define("DAYS_IN_WEEK", "7");
        /*
        for($j = 0; $j < $calendar_rows_count; $j++)
        {
            $table .= "\n\t<tr>";

            for($i = 1; $i <= 7; $i++){
                $table .= "<td>".(($j * DAYS_IN_WEEK) + $i)."</td>";
            }

            $table .= "\n\t</tr>";
        }
        */
            //Generating the headers for the calendar
            $table .= "\n<tr>";
        
                $table .= "\n<th>";
                    $table .= "SUN";
                $table .= "\n</th>";

                $table .= "\n<th>";
                    $table .= "MON";
                $table .= "\n</th>";

                $table .= "\n<th>";
                    $table .= "TUE";
                $table .= "\n</th>";

                $table .= "\n<th>";
                    $table .= "WED";
                $table .= "\n</th>";

                $table .= "\n<th>";
                    $table .= "THUR";
                $table .= "\n</th>";
                
                $table .= "\n<th>";
                    $table .= "FRI";
                $table .= "\n</th>";

                $table .= "\n<th>";
                    $table .= "SAT";
                $table .= "\n</th>";
            
            $table .= "\n</tr>";

            $table .= "\n<tr>";
                
                //Inserting the days that for padding to the calendar
                for($j = 0; $j < $day_first_date_of_month; $j++)
                {
                    $table .= "\n<td>";
                    
                    $table .= "\n</td>";
                }

                //Tracks the column of the day being inserted
                $calendar_column = $day_first_date_of_month;

                //Inserting the days of the month for the calendar
                for ($j = 1; $j <= $days_in_current_month; $j++)
                {
                    //Detects the starting day of the week
                    if ($calendar_column == 0)
                    {
                        $table .= "\n<tr>";
                    }
                    
                    //Inserts day into the table
                    $table .= "\n<td>";
                        $table .= $j; //inserts contents of the cell
                        // Check for the database based on $j which is the date of the month, $current_month, $current_year
                        //"SELECT * FROM calendar WHERE reminder_date = '$current_year - $current_month - $j'";
                        
                        $table.= calendar_select($current_year."-".$current_month."-".$j);


                    $table .= "\n</td>";
                
                    //Detects the last day of the week
                    if ($calendar_column == 6)
                    {
                        $table .= "\n</tr>";        
                    }

                    $calendar_column++;
                    $calendar_column %=7;
                }
            //$table .= "\n</tr>";

        $table .= "\n</table>";

        //echo date_format($date,"Y/m/d H:i:s");

        echo "<a style = 'color: blue;' href='calendar.php?year=".$prev_year."&month=".$prev_month."'>PREVIOUS</a>";
    
        echo "<h1>". date("F Y", mktime(0, 0, 0, $current_month, 1, $current_year)) . "</h1>";
        echo "<a style = 'color: blue;' href='calendar.php?year=".$next_year."&month=".$next_month."'>NEXT</a>";
        echo "</div>
        <div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom\">
        ";
        //echo "<h1>". date("F Y", mktime(0, 0, 0, $next_month, 1, $next_year)) . "</h1>";
        //echo "<h1>". date("F Y", mktime(0, 0, 0, $prev_month, 1, $prev_year)) . "</h1>";
        echo $table;




    ?>
</div> 

    <!-- <table cellpadding="2" cellspacing="0" border="1" width="90%" style="margin-left:auto; 
                                            margin-right:auto;
                                            font-family: arial, verdana, tahoma, sans-serif;" >
        <tr>
            <td colspan="7" style="background-color:#CCCCCC;">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                        <th style="width: 20px;"><a href="/pufferd/webd2201/dates.php?month=1&amp;year=2022">&lt;&lt;PREV</a></th>
                            <th style="font-size: 120%;"><center>February 2022</center></th>
                            <th  style="width: 20px;"><a href="/pufferd/webd2201/dates.php?month=3&amp;year=2022">NEXT&gt;&gt;</a></th>
                        </tr>
                </table>
            </td>
        </tr>
        <tr>
            <th style="width: 10%;" >Sunday</th>
            <th style="width: 16%;"  >Monday</th>
                <th style="width: 16%;" >Tuesday </th>
            <th style="width: 16%;" >Wednesday</th>
                <th style="width: 16%;" >Thursday</th>
            <th style="width: 16%;" >Friday</th>
                <th style="width: 10%;"  >Saturday</th>
        </tr>

        <tr>
            <td style="background-color:#EEEEEE;" colspan="2">&nbsp;</td>
            <td valign="top"  align="left">1<br/><br/><br/><br/><br/></td>
            <td valign="top"  align="left">2<br/><br/><br/><br/><br/></td>
            <td valign="top"  align="left">3<br/><br/><br/><br/><br/></td>
            <td valign="top"  style="background-color: #90EE90;"  align="left">4<br/><b><em><br/><a href="./lab2.php">Lab 2 Due (CRN: 14933)</a></em><br/><span style='font-size: 0.9em'>Time: 6:00 PM<br/></span></b></td>
            <td valign="top"  align="left">5<br/><br/><br/><br/><br/></td>
    </tr>
    <tr>		<td valign="top"  align="left">6<br/><br/><br/><br/><br/></td>
            <td valign="top"  align="left">7<br/><br/><br/><br/><br/></td>
            <td valign="top"  align="left">8<br/><br/><br/><br/><br/></td>
            <td valign="top"  align="left">9<br/><br/><br/><br/><br/></td>
            <td valign="top"  align="left">10<br/><br/><br/><br/><br/></td>
            <td valign="top"  style="background-color: #90EE90;"  align="left">11<br/><b><em><br/><a href="./lab3.php">Lab 3 Due (CRN: 14933)</a></em><br/><span style='font-size: 0.9em'>Time: 6:00 PM<br/></span></b></td>
            <td valign="top"  align="left">12<br/><br/><br/><br/><br/></td>
    </tr>
    <tr>		<td valign="top"  align="left">13<br/><br/><br/><br/><br/></td>
            <td valign="top"  align="left">14<br/><br/><br/><br/><br/></td>
            <td valign="top"  align="left">15<br/><br/><br/><br/><br/></td>
            <td valign="top"  align="left">16<br/><br/><br/><br/><br/></td>
            <td valign="top"  align="left">17<br/><br/><br/><br/><br/></td>
            <td valign="top"  align="left">18<br/><br/><br/><br/><br/></td>
            <td valign="top"  align="left">19<br/><br/><br/><br/><br/></td>
    </tr>
    <tr>		<td valign="top"  align="left">20<br/><br/><br/><br/><br/></td>
            <td valign="top"  style="background-color: #90EE90;"  align="left">21<br/><b><em>Family Day - NO CLASSES</em><br/><span style='font-size: 0.9em'>Time: All day<br/></span></b></td>
            <td valign="top"  style="background-color: #90EE90;"  align="left">22<br/><b><em><br/><a href="./lectures.php">Term Test 1 - CRN 14620</a></em><br/><span style='font-size: 0.9em'>Time: 10:10am - 12:00pm<br/>Location: A-wing possibly online</span></b><hr/><b><em><br/><a href="./lectures.php">Term Test 1 - CRN 14629</a></em><br/><span style='font-size: 0.9em'>Time: 8:00 am - 10:00 am<br/>Location: C-wing possibly online</span></b></td>
            <td valign="top"  align="left">23<br/><br/><br/><br/><br/></td>
            <td valign="top"  align="left">24<br/><br/><br/><br/><br/></td>
            <td valign="top"  style="background-color: #90EE90;"  align="left">25<br/><b><em><br/><a href="./lab4.php">Lab 4 Due (CRN: 14933)</a></em><br/><span style='font-size: 0.9em'>Time: 6:00 PM <br/></span></b></td>
            <td valign="top"  align="left">26<br/><br/><br/><br/><br/></td>
    </tr>
    <tr>		<td valign="top"  align="left">27<br/><br/><br/><br/><br/></td>
            <td valign="top"  style="background-color: #90EE90;"  align="left">28<br/><b><em>READING WEEK - NO CLASSES</em><br/><span style='font-size: 0.9em'>Time: All Day<br/></span></b></td>
            <td  style="background-color:#EEEEEE;"  colspan="5">&nbsp;</td></tr>

    </table> -->


<?php
    include "./includes/footer.php"
?>
<!-- <iframe 
    src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=America%2FToronto&src=dW5kdmxjYnQ0ZHYwYzM3MG10MjAxaTg5dHNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%233F51B5" 
    style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no">
</iframe> -->

