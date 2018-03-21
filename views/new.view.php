<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include_once 'views/stylesheets.php'; ?>
	<title>New</title>
</head>
<body>
<div class="container section no-pad-bot">
	<h1>Nieuwe registratie</h1>
	<form method="post" action="new.php">
		<div class="input-field">
			<input id="name" type="text" name="name" required class="validate">
			<label for="name">Naam</label>
		</div>
		<p>
			<input type="checkbox" value="1" id="type" name="type">
			<label for="type">Grote auto</label>
		</p>
		<p>
			<input class="with-gap" type="radio" id="male" value="man" name="gender" required>
			<label for="male">Man</label>
			<input class="with-gap" type="radio" id="female" value="vrouw" name="gender" required>
			<label for="female">Vrouw</label>
		</p>


		<div style="padding-bottom: 10px;">
			<label for="country">Land</label>
			<select id="country" class="browser-default" required name="country">
				<option value="" selected disabled> - Kies land -</option>
				<option value="nederland">Nederland</option>
				<option value="belgië">België</option>
				<option value="duitsland">Duitsland</option>
				<option value="frankrijk">Frankrijk</option>
				<option value="spanje">Spanje</option>
				<option value="italie">Italië</option>
				<option value="luxemburg">Luxemburg</option>
				<option value="zwitserland">Zwitserland</option>
				<option value="oostenrijk">Oostenrijk</option>
				<option value="noord-korea">Noord - Korea</option>
			</select>
		</div>
		<button class="btn waves-effect waves-light" type="submit" name="submit">Registreer
			<i class="material-icons right">send</i>
		</button>
	</form>
	<a href="index.php" class="btn blue">terug naar het overzicht</a>
</div>
<?php include_once 'views/javascripts.php'; ?>
</body>
</html>