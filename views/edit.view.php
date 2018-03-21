<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include_once 'views/stylesheets.php'; ?>
	<title>
		wijzig
	</title>
</head>
<body>
<div class="container section no-pad-bot">
	<h1>Wijzig <?php echo $registration->getName(); ?></h1>
	<form method="post" action="edit.php?id=<?php echo $registration->getId(); ?>">
		<div class="input-field">
			<input id="name" value="<?php echo $registration->getName(); ?>" type="text" name="name" required
				   class="validate">
			<label for="name">Naam</label>
		</div>
		<p>
			<input type="checkbox" value="1" <?php echo $registration->getType() == 'grote auto' ? 'checked' : ''; ?>
				   id="type" name="type">
			<label for="type">Grote auto</label>
		</p>
		<p>
			<input class="with-gap" type="radio" <?php echo $registration->getGender() == 'man' ? 'checked' : ''; ?>
				   id="male" value="man" name="gender" required>
			<label for="male">Man</label>
			<input class="with-gap" type="radio"
				   id="female" <?php echo $registration->getGender() == 'vrouw' ? 'checked' : ''; ?> value="vrouw"
				   name="gender" required>
			<label for="female">Vrouw</label>
		</p>


		<div style="padding-bottom: 10px;">
			<label for="country">Land</label>
			<select id="country" autofocus="<?php echo $registration->getCountry(); ?>" class="browser-default" required
					name="country">
				<option value="" disabled> - Kies land -</option>
				<option <?php echo $registration->getCountry() == 'nederland' ? 'selected' : ''; ?> value="nederland">
					Nederland
				</option>
				<option <?php echo $registration->getCountry() == 'belgië' ? 'selected' : ''; ?> value="belgië">België
				</option>
				<option <?php echo $registration->getCountry() == 'duitsland' ? 'selected' : ''; ?> value="duitsland">
					Duitsland
				</option>
				<option <?php echo $registration->getCountry() == 'frankrijk' ? 'selected' : ''; ?> value="frankrijk">
					Frankrijk
				</option>
				<option <?php echo $registration->getCountry() == 'spanje' ? 'selected' : ''; ?> value="spanje">Spanje
				</option>
				<option <?php echo $registration->getCountry() == 'italie' ? 'selected' : ''; ?> value="italie">Italië
				</option>
				<option <?php echo $registration->getCountry() == 'luxemburg' ? 'selected' : ''; ?> value="luxemburg">
					Luxemburg
				</option>
				<option <?php echo $registration->getCountry() == 'zwitserland' ? 'selected' : ''; ?>
						value="zwitserland">Zwitserland
				</option>
				<option <?php echo $registration->getCountry() == 'oostenrijk' ? 'selected' : ''; ?> value="oostenrijk">
					Oostenrijk
				</option>
				<option <?php echo $registration->getCountry() == 'noord-korea' ? 'selected' : ''; ?>
						value="noord-korea">Noord - Korea
				</option>
			</select>
		</div>
		<button class="btn waves-effect waves-light" type="submit" name="submit">Wijzig
			<i class="material-icons right">send</i>
		</button>
		<a href="edit.php?id=<?php echo $registration->getId(); ?>&task=delete"
		   class="btn waves-effect waves-light red">Verwijder</a>
		<a href="index.php" class="btn waves-effect waves-light blue">terug naar het overzicht</a>
	</form>
</div>
<?php include_once 'views/javascripts.php'; ?>
</body>
</html>