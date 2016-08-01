<?php

if(!$this->session->userdata('type') == 'admin' ){
    $this->load->helper('url');
    redirect('http://220.158.205.13/classbooking/Login_controller/index', 'refresh');
}
?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
	<meta charset="utf-8" />
</head>
<body>
    <center>
        <h2>Add Course</h2>
        <hr/>
        <form>
            <table>
                <tr>
                    <td>Course Title</td>
                    <td><input type="text" name="title" /></td>
                </tr>
                <tr>
                    <td>Facultyname</td>
                    <td>
                        <select name="faculty">
                            {facultyName}
                            <option>{username}</option>
                            {/facultyName}
                        </select>
                    </td>
                 </tr>
                  <tr>
                    <td>Room Number: </td>
                    <td>
                        <select name="classroom">
                            {classroom}
                            <option>{roomnumber}</option>
                            {/classroom}
                        </select>
                    </td>
                    </tr>
                 <tr>
                    <td>Time from</td>
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
                    <td>Date</td>
                        <td>
                            <select name="date">
                                <option>Sunday</option>
                                <option>Monday</option>
                                <option>Tuesday</option>
                                <option>Wednesday</option>
                                <option>Thursday</option>
                                <option>Friday</option>
                                <option>Satruday</option>
                            </select>
                        </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit"value="AddCourse"name="btnAddCourse"</td>
                </tr>
            </table>
        </form>

    </center>
</body>
</html>
