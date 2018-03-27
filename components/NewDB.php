<?php

class NewDB
{
	public function __construct($db)
	{
		try {
			$ini = new IniFile('parameters.ini');
			$server = $ini->getParameter('host');
			$user = $ini->getParameter('user');
			$password = $ini->getParameter('password');
			$pdo = new PDO("mysql:host=$server", $user, $password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $pdo->prepare("CREATE SCHEMA IF NOT EXISTS `$db`");
			if (!$stmt->execute()){
				return false;
			}
			$ini->setParameter('database',$db);
			$ini->UpdateIniFile();
			return true;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}