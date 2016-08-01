<html>
	<head>
		<title></title>
	</head>
	<body>
	<center>
		<h1>Login</h1>
		<hr/>
		
		<form method="post" action="/classbooking/Login_controller/login">
		<table border="0">
			
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" value="<?php echo set_value('username'); ?>" /></td>
                <td><?php echo form_error('username'); ?></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" value="<?php echo set_value('password'); ?>"/></td>
                <td><?php echo form_error('password'); ?></td>
			</tr>
			
			<tr>
			
				<td></td>
				<td><input type="submit" name="login" value="Login" /></td>
			</tr>
			
		</table>
		
		</form>
		</center>
	</body>
</html>