
<?php include('header.php'); ?>
<?php 
if ($_GET['name'] != NULL && $_GET['quantite'] != NULL && $_GET['submit'] == OK){
	handle_cookie($_GET['name'], $_GET['quantite']);
} 
?>
		
		<header>
			<h1><img src="./img/font.png" alt="title"></h1>
		</header>
		<?php
		$conn = connexion();
		$req = mysqli_query($conn, "SELECT id_objet, name, value, url FROM objet;");
		$tab = array();
		while ($arr = mysqli_fetch_array($req)){
			//$tab[] = $arr;
			?>
			<div class="img">
				<form action="" method="GET">
					<img src="<?php echo $arr['url']; ?>" name="<?php echo $arr['name']; ?>"><br />
					<input class="index_input quantity" type="text" name="quantite" value="">
					<input class="index_input" type="hidden" name="name" value="<?php echo $arr['name']; ?>">
					<p><?php echo $arr['value']; ?> Euros/h</p>
					<input class="index_input btn" type="submit" name="submit" value="OK">
				</form>
			</div>
		<?php } ?>
<?php include('footer.php'); ?>
