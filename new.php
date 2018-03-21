<?php
include_once 'components/autoloader.php';

if (!isset($_POST['submit'])) {
	include_once 'views/new.view.php';
	exit;
}

if (empty(trim($_POST['name']))) {
	include_once 'views/new.view.php';
	exit;
}

$registration = new Registration();
$db = new Database();

$registration->setCountry(filter_input(INPUT_POST, "country", FILTER_SANITIZE_STRING));
$registration->setGender(filter_input(INPUT_POST, "gender", FILTER_SANITIZE_STRING));
$registration->setName(filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS));
$registration->setType(filter_input(INPUT_POST, "type", FILTER_SANITIZE_NUMBER_INT));

$new = $db->insertRegistration($registration);
header('Location: detail.php?id='.$new);