<?php

    if(!$this->session->userdata('type') == 'faculty' ){
        $this->load->helper('url');
        redirect('http://220.158.205.13/classbooking/Login_controller/index', 'refresh');	
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
     <style>
        a{text-decoration: none;
        color: black;}
    </style>
</head>
<body>
    <center>
        <h2>Faculty view</h2>
        <hr />

        <button><a href="/classbooking/Faculty_controller/bookingRequest1">BookingRequest</a></button>
        <button><a href="/classbooking/Faculty_controller/bookingList">BookingList</a></button>
        <button><a href="/classbooking/Faculty_controller/makeupList">MakeupList</a></button>
        <button><a href="/classbooking/Faculty_controller/logout">Log out</a></button>
        
        <br/>

        <table>
            <tr>
                <td></td>
            </tr>
        </table>

    </center>
</body>
</html>