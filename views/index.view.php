<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include_once 'views/stylesheets.php'; ?>
	<title>Welkom</title>
</head>
<body>
<div class="container section no-pad-bot">
	<h1>Registraties</h1>
	<table>
		<thead>
		<tr>
			<th>Id</th>
			<th>Naam</th>
			<th>Type</th>
			<th>Geslacht</th>
			<th>Land</th>
			<th>Acties</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($registrations as $registration): ?>
			<tr>
				<td><?php echo $registration->getId(); ?></td>
				<td><?php echo htmlspecialchars($registration->getName()); ?></td>
				<td><?php echo $registration->getType(); ?></td>
				<td><?php echo $registration->getGender(); ?></td>
				<td><?php echo $registration->getCountry(); ?></td>
				<td>
					<a class="btn waves-effect waves-light green" href="detail.php?id=<?php echo $registration->getId();?>">Bekijk</a>
					<a class="btn waves-effect waves-light blue" href="edit.php?id=<?php echo $registration->getId();?>">Wijzig</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<a class="btn-floating right btn-large waves-effect waves-light red" href="new.php"><i
				class="material-icons">add</i></a>
</div>
<?php include_once 'views/javascripts.php'; ?>
</body>
</html>