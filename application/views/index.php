<html>
<head>
	<title>Login/Registration</title>
	<style type="text/css">
		.container{
			width: 600px;
			height: 800px;
			font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
		}
		.register table{
			border: 1px solid blue;
		}

		.login table{
			border: 1px solid blue;
		}

	</style>

</head>
<body>
	<div class="Container">
		<div>
			<h2>Please Login or Register</h2>
			<div class="register">
				<form action="register" method="POST">
					<table>

						<tr>
							<td>Name</td>
							<td><input type="text" name="name" /></td>
						
						</tr>
						<tr>
							<td>Alias</td>
							
							<td><input type="text" name="alias"/></td>

						</tr>
						<tr>
							<td>Email</td>

							<td><input type="text" name="email" /></td>
						
						</tr>
						<tr>
							<td>Password</td>

							<td><input type="password" name="password" /></td>
						
						</tr>
						<tr>	
							<td>Confirm Password</td>

							<td><input type="password" name="confirmPassword" /></td>
						
						</tr>
						<tr>	
							<td>Date of Birth</td>

							<td><input type="date" name="dob" /><td>
						</tr>
						<tr>	
							<td><input type="submit" value="REGISTER"/></td>
						</tr>
					</table>
				</form>
<?php
			if ($this->session->flashdata('regErrors')) {
?>
				<div>
<?php
					$errors = $this->session->flashdata('regErrors');

					foreach ($errors as $err) {
						echo $err;
					}
?>
				</div>
<?php
			}
?>
			</div>
			<div class="login">
				<form action="login" method="POST">
					<table>
						<tr>
							<td>Email</td>
						
							<td><input type="text" name="email"  /></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="password"  /></td>
						</tr>
						<tr>
							<td><input type="submit" value="LOGIN"  /></td>
						</tr>
					</table>
				</form>
<?php
			if ($this->session->flashdata('loginErrors')) {
?>
				<div>
<?php
					echo $this->session->flashdata('loginErrors');
?>
				</div>
<?php
			}
?>
			</div>
		</div>
	</div>
</body>
</html>