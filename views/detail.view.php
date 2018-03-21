<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include_once 'views/stylesheets.php';?>
	<title>Registratie <?php echo $registration->getName(); ?></title>
</head>
<body>
<div class="container section no-pad-bot">
	<h1><?php echo $registration->getName(); ?> bekijken</h1>
	<table class="bordered">
		<tbody>
		<tr>
			<th>Id</th>
			<td><?php echo $registration->getId(); ?></td>
		</tr>
		<tr>
			<th>Naam</th>
			<td><?php echo $registration->getName(); ?></td>
		</tr>
		<tr>
			<th>Geslacht</th>
			<td><?php echo $registration->getGender(); ?></td>
		</tr>
		<tr>
			<th>Auto</th>
			<td><?php echo $registration->getType(); ?></td>
		</tr>
		<tr>
			<th>Land</th>
			<td><?php echo $registration->getCountry(); ?></td>
		</tr>
		</tbody>
	</table>
	<a class="btn waves-effect waves-light green" href="edit.php?id=<?php echo $registration->getId();?>">Wijzig</a>
	<a class="btn waves-effect waves-light red" href="edit.php?id=<?php echo $registration->getId();?>&task=delete">Verwijder</a>
	<a href="index.php" class="btn waves-effect waves-light blue">terug naar het overzicht</a>

</div>
<?php include_once 'views/javascripts.php';?>
</body>
</html>