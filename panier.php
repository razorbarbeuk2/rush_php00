<?php include('header.php'); ?>
<div class="content_cart">
	<div class="cart"></div>
	<form action="<?php valid_cart(); ?>" method="POST">
		<input class="btn" type='submit' name='submit' value='Valider la commande'>
	</form>
</div>
<?php include('footer.php'); ?>
