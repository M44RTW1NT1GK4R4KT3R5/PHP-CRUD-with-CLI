<?php

class Database
{

	private $pdo;

	public function __construct()
	{
		try {
			$ini = new IniFile('parameters.ini');
			$server = $ini->getParameter('host');
			$db = $ini->getParameter('database');
			$user = $ini->getParameter('user');
			$password = $ini->getParameter('password');
			if ($db == ''){
				die('no database existing, run "php components/console create/database" to create a database.');
			}
			$this->pdo = new PDO("mysql:host=$server;dbname=$db", $user, $password);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function updateRegistration(Registration $registration)
	{
		$stmt = $this->pdo->prepare("UPDATE `registration` SET `name` = :name, `gender` = :gender, `type` = :type, `country` = :country WHERE `id` = :id");
		$stmt->bindParam(':id', $registration->getId());
		$stmt->bindParam(':name', $registration->getName());
		$stmt->bindParam(':gender', $registration->getGender());
		$stmt->bindParam(':type', $registration->getType());
		$stmt->bindParam(':country', $registration->getCountry());
		$stmt->execute();
	}

	public function insertRegistration(Registration $registration)
	{
		$stmt = $this->pdo->prepare("INSERT INTO `registration` (`name`,`gender`,`type`,`country`) VALUES (:name, :gender, :type, :country)");
		$stmt->bindParam(':name', $registration->getName());
		$stmt->bindParam(':gender', $registration->getGender());
		$stmt->bindParam(':type', $registration->getType());
		$stmt->bindParam(':country', $registration->getCountry());
		$stmt->bindParam(':name', $_POST['name']);
		$stmt->execute();
		return $this->pdo->lastInsertId();
	}

	public function getAllRegistrations()
	{
		$stmt = $this->pdo->query("SELECT * FROM `registration`");
		return $stmt->fetchAll(PDO::FETCH_CLASS, "Registration");
	}

	public function getRegistrationById()
	{
		$stmt = $this->pdo->prepare("SELECT * FROM `registration` WHERE `id` = :id");
		$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Registration');
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function deleteRegistration(Registration $registration)
	{
		$stmt = $this->pdo->prepare("DELETE FROM `registration` WHERE `id` = :id");
		$stmt->bindParam(':id', $registration->getId());
		$stmt->execute();
	}

	public function truncate()
	{
		$stmt = $this->pdo->prepare("TRUNCATE TABLE `registration`");
		$stmt->execute();
	}

	public function createTable()
	{
		$stmt = $this->pdo->prepare(file_get_contents(__DIR__ . '/../table.sql'));
		$stmt->execute();
	}

	public function dropTable()
	{
		$stmt = $this->pdo->prepare("DROP TABLE IF EXISTS `registration`");
		$stmt->execute();
	}
}