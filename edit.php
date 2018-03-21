<?php
include_once 'components/autoloader.php';
if (!isset($_GET['id'])) {
	header('Location: index.php');
	exit;
}
$db = new Database();
$registration = $db->getRegistrationById();

if (empty($registration)) {
	header('Location: index.php');
	exit;
}

if (isset($_GET['task']) && $_GET['task'] == 'delete') {
	$db->deleteRegistration($registration);
	header('Location: index.php');
	exit;
}

if (!isset($_POST['submit'])) {
	include_once 'views/edit.view.php';
	exit;
}

if (empty(trim($_POST['name']))) {
	include_once 'views/edit.view.php';
	exit;
}


$registration->setCountry(filter_input(INPUT_POST, "country", FILTER_SANITIZE_STRING));
$registration->setGender(filter_input(INPUT_POST, "gender", FILTER_SANITIZE_STRING));
$registration->setName(filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS));
$registration->setType(filter_input(INPUT_POST, "type", FILTER_SANITIZE_NUMBER_INT));

$db->updateRegistration($registration);

header('Location: detail.php?id='.$registration->getId());
