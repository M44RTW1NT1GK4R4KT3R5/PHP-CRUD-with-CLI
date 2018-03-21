<?php
include_once 'components/autoloader.php';

$db = new Database();
$registrations = $db->getAllRegistrations();
include_once 'views/index.view.php';
