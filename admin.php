
<?php include('header.php'); ?>
<?php
// if ($_SESSION['LOGGUED'] != NULL){
// 	redir_index();
// }
// else{
// 	if (verif_admin($_SESSION['LOGGUED']) == 0){
// 		redir_index();
// 	}
// }
?>
<nav class="admin_nav" id="admin_nav">
	<ul>
		<li class="active"><a href="#add_object">Add object</a></li>
		<li class=""><a href="#delete_object">Delete object</a></li>
		<li class=""><a href="#chmod_user_set_admin">Change user to admin</a></li>
		<li class=""><a href="#chmod_admin_set_user">Change admin to user</a></li>
		<li class=""><a href="#delete_account">Delete account</a></li>
	</ul>
</nav>
<div id="admin_content">
	<div id="add_object" class="active" style="display: block;">
		<form action="" method="GET">
			<label for="name">name</label><input class="index_input" type="text" name="name" value=""></br></br>
			<label for="class">class</label><input class="index_input" type="text" name="class" value=""></br></br>
			<label for="valeur">valeur</label><input class="index_input" type="text" name="value" value=""></br></br>
			<label for="url">url</label><input class="index_input" type="text" name="url" value=""></br></br>
			<input class="index_input btn" type="submit" name="submit" value="OK">
		</form>
	</div>
	<div id="delete_object" style="display: none;"> 
		<form action="" method="GET">
			<label for="name">name</label><input class="index_input " type="text" name="name" value="">
			<input class="index_input btn" type="submit" name="submit" value="OK">
		</form>
	</div>
	<div id="chmod_user_set_admin" style="display: none;">
		<form action="" method="GET">
			<label for="name">name</label><input class="index_input " type="text" name="name" value="">
			<input class="index_input btn" type="submit" name="submit" value="OK">
		</form>
	</div>
	<div id="chmod_admin_set_user" style="display: none;">
		<form action="" method="GET">
			<label for="name">name</label><input class="index_input " type="text" name="name" value="">
			<input class="index_input btn" type="submit" name="submit" value="OK">
		</form>
	</div>
	<div id="delete_account" style="display: none;">
		<form action="" method="GET">
			<label for="name">name</label><input class="index_input " type="text" name="name" value="">
			<input class="index_input btn" type="submit" name="submit" value="OK">
		</form>
	</div>
	
</div>

<?php include('footer.php'); ?>
