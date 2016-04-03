<html>
<head>
	<title>Friends</title>
	<style type="text/css">


	.container{
		width: 600px;
		height: 800px;
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	}

	.initial_message{

		color: blue;
		font font-weight: bold;
	}

	form{
		padding: 5px 10px 5px 10px;

	}
	thead{
		font-weight: bold;
		text-align: center;
	}
	.myfriends td{
		border:2px solid blue;
		padding: 5px 10px 5px 10px;
	}

	.notFriends td{
		border: 2px solid red;
		padding: 5px 10px 5px 10px;

	}
	.notFriends

	</style>

</head>
<body>
	<div class="container">
		<div class="initial_message">
			<div>
				<h3>Hi, <?= $this->session->userdata("currentUser")['alias'] ?>!</h3>
				<h4><a href="logout">Logout</a></h4>
			</div>
		</div>
<?php
	if (count($allFriends)) {
?>
		<div class="myFriends">
			<h3>Here is your list of friends:</h3>
			<table>
				<thead>
					<tr>
						<td>Alias</td>
						<td>Actions</td>
					</tr>
				</thead>
				<tbody>
<?php
				foreach($allFriends as $data) {
?>
					<tr>
						<td><?= $data['alias'] ?></td>
						<td><a href="user/<?= $data['id'] ?>">View Profile</a> or <a href="removeFriendship/<?= $data['id'] ?>">Remove Friend</a></td>
					</tr>
<?php
				}
?>

				</tbody>
			</table>
		</div>
<?php
	}
	else {
?>
		<h4>You don't have friends yet. Ask more people to Register!!!</h4>
<?php
	}
	if (count($noFriends)) {
?>
		<div class="notFriends">
			<h4>Users not on your friends list:</h4>
			<table>
				<thead>
					<tr>
						<td>Alias</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
<?php
				foreach($noFriends as $info) {
?>
					<tr>
						<td><?= $info['alias'] ?></td>
						<td>
							<form method="POST" action="addFriendship/<?= $info['id'] ?>">
								<input type="submit" value="Add New Friend"/>
							</form>
						</td>
					</tr>
<?php
				}
?>
				</tbody>
			</table>
		</div>
<?php
	}
?>
	</div>
</body>
</html>