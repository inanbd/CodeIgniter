<?php
                
    if(!$this->session->userdata('type') == 'admin' ){
        $this->load->helper('url');
        redirect('http://220.158.205.13/classbooking/Login_controller/index', 'refresh');	
    }
?>



<!DOCTYPE html>
<html>
<head>
    <title>Admin view</title>
	<meta charset="utf-8" />
    
     <style>
        a{text-decoration: none;
            color: black;}
    </style>
</head>
<body>
   
        <center>
            <h2>Admin views</h2>
            <hr />
            <button>
                <a href="/classbooking/Admin_controller/addFaculty">Add Feculty</a>
            </button>
            <button>
                <a href="/classbooking/Admin_controller/addClassRoom">Add Class Room</a>
            </button>
            <button>
                <a href="/classbooking/Admin_controller/addCourse">Add Course</a>
            </button>
            <button>
                <a href="/classbooking/Faculty_controller/logout">Log out</a>
            </button>
        <br />
        <br />

        <button>
                <a href="/classbooking/Admin_controller/roomBooking">Room Booking Requests</a>
            </button>
            <button>
                <a href="/classbooking/Admin_controller/classSchedule">Class Schedule</a>
            </button>
            <button>
                <a href="/classbooking/Admin_controller/makeupReport">Report</a>
            </button>
        </center>
        
</body>
</html>  