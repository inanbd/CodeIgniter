<?php

if(!$this->session->userdata('type') == 'admin' ){
    $this->load->helper('url');
    redirect('http://220.158.205.13/classbooking/Login_controller/index', 'refresh');
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Room Booking Confirmation</title>
	<meta charset="utf-8" />
</head>
<body>
    <center>
        <h2>Room Booking Confirmation</h2>
        <hr />
        {class}
        <form method="post" action="">
            <table>
                <tr>
                    <td>ID:</td>
                    <td>{id}</td>
                    
                </tr>
                <tr>
                    <td>Faculty:</td>
                    <td>{faculty}</td>
                    
                </tr>
                <tr>
                    <td>Date:</td>
                    <td>{day}</td>
                </tr>
                <tr>
                    <td>Timefrom:</td>
                    <td>{timefrom}</td>
                </tr>
                <tr>
                    <td>Timeto:</td>
                    <td>{timeto}</td>
                </tr>
                <tr>
                    <td>Course:</td>
                    <td>{course}</td>
                </tr>

                <tr>
                    <td>Room:</td>
                    <td>
                        <select name="roomNumber">
                            {rooms}
                            <option>{roomnumber}</option>
                            {/rooms}
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Status:</td>
                    <td>{status}</td>
                </tr>
                <tr>
                    <input type="hidden" name="id" value="{id}" />
                    <input type="hidden" name="faculty" value="{faculty}" />
                    <input type="hidden" name="day" value="{day}" />
                    <input type="hidden" name="timeto" value="{timeto}" />
                    <input type="hidden" name="timefrom" value="{timefrom}" />
                    <td><input type="submit" value="Confirm" name="btnConfirm" /></td>
                </tr>
                
            </table>

        </form>
        <br />
        <br />
        {/class}

    </center>
</body>
</html>
