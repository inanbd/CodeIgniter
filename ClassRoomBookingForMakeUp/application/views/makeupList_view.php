<?php
if(!$this->session->userdata('type') == 'faculty'||!$this->session->userdata('type') == 'admin' ){
    $this->load->helper('url');
    redirect('http://220.158.205.13/classbooking/Login_controller/index', 'refresh');
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Booking List</title>
    <meta charset="utf-8" />

    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
    <center>
        <h2>Makeup List</h2>
        <hr />
        {makeupList}
        <table border="1">
            <tr>
                <td>Date:</td>
                <td>{day}</td>
            </tr>
            <tr>
                <td>Faculty:</td>
                <td>{faculty}</td>
            </tr>
            <tr>
                <td>Starting Time:</td>
                <td>{timefrom}</td>
            </tr>
            <tr>
                <td>Ending Time:</td>
                <td>{timeto}</td>
            </tr>
            <tr>
                <td>Course:</td>
                <td>{course}</td>
            </tr>
            <tr>
                <td>Room:</td>
                <td>{room}</td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>{status}</td>
            </tr>

        </table>
        <br />
        {/makeupList}
    </center>

</body>
</html>