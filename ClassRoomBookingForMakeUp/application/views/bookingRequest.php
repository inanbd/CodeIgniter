<?php

   if(!$this->session->userdata('type') == 'faculty' ){
        $this->load->helper('url');
        redirect('http://220.158.205.13/classbooking/Login_controller/index', 'refresh');	
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>class booking request</title>
    
   
</head>
<body>
	
	<center>
        <h2>class Booking Request</h2>
        <hr />

        <form method="post" action="/classbooking/Faculty_controller/bookingRequest2">
            <table>


                <tr>
                    <td>Date</td>
                    <td><input type="date" name="date" /></td>
                </tr>

                <tr>
                    <td>Time From</td>
                    <td>
                        <select name="timefrom">
                            {timeslots}
                            <option>{time}</option>
                            {/timeslots}
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Time To</td>
                    <td>
                        <select name="timeto">
                            {timeslots}
                            <option>{time}</option>
                            {/timeslots}
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Course</td>
                    <td>
                        <select name="course">
                            {all_courses}
                            <option>{title}</option>
                            {/all_courses}
                        </select>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" name="request" value="Request" /></td>
                    <td></td>
                </tr>
            </table>
        </form>

    </center>

</body>
</html>