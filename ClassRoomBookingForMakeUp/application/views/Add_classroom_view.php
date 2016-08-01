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
        <form method="post" action="/classbooking/Admin_controller/addClassRoom">
            <h2>Add Class room</h2>
            <p>Class Room Number: </p>
            <input type="text" name="roomnumber" />
            <input type="submit" value="AddClassroom" name="btnAddClassroom" />
        </form>
    </center>
</body>
</html>
