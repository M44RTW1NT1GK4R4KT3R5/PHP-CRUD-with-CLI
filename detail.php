<?php
include_once 'components/autoloader.php';
if (!isset($_GET['id'])) {
	header('Location: index.php');
	exit;
}
$db = new Database();
$registration = $db->getRegistrationById();
if (empty($registration)){
	header('Location: index.php');
	exit;
}
include_once 'views/detail.view.php';
