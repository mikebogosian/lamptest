<html>
<head>
	<title><?= $userData['alias'] ?></title>
	<style type="text/css">
		* {
			margin: 0px;
			padding: 0px;
		}
		.container{
		width: 600px;
		height: 800px;
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	}
		table td{
			border: 1px solid blue;
			padding: 5px 10px 5px 10px; 
		}
	a{
		text-decoration: none;
	}

	</style>

</head>
<body>
	<div class="container">
			<div>
				<h2><?= $userData['alias'] ?>'s Detail Page</h2>
				<h4><a href="/users">Home</a> | <a href="/logout">Logout</a></h4>
			</div>
		<table>

			<tr>
				<td><p><b>Name:</b></td>
				<td><?= $userData['name'] ?></p></td>
			</tr>
			<tr>
				<td><p><b>Email Address:</b></td>
				<td><?= $userData['email'] ?></p></td>
			</tr>
		</table>
	</div>
</body>
</html>