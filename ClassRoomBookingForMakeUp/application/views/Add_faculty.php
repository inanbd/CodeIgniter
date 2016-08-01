<?php

    if(!$this->session->userdata('type') == 'admin' ){
        $this->load->helper('url');
        redirect('http://220.158.205.13/classbooking/Login_controller/index', 'refresh');	
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Addfaculty</title>
    
   
</head>
<body>
	
	<center>
        <h2>Add Faculty</h2>
        <hr />
        <form method="post" action="/classbooking/Admin_controller/add">
            <table>

                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" />
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="text" name="password" />
                    </td>
                </tr>

                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" />
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Add" />
                    </td>
                    <td></td>
                </tr>
            </table>
        </form>

    </center>

</body>
</html>