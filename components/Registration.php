<?php

class Registration implements Entity
{
	private $id;
	private $name;
	private $gender;
	private $type;
	private $country;

	/**
	 * @return integer
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName(string $name)
	{
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getGender(): string
	{
		return $this->gender;
	}

	/**
	 * @param string $gender
	 */
	public function setGender($gender)
	{
		switch ($gender) {
			case 'man':
			case 'vrouw':
				$this->gender = $gender;
				break;
			default:
				$this->gender = 'man';
		}
	}

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 */
	public function setType($type)
	{
		switch ($type) {
			case '1':
				$this->type = 'grote auto';
				break;
			default:
				$this->type = 'kleine auto';

		}
	}

	/**
	 * @return string
	 */
	public function getCountry(): string
	{
		return $this->country;
	}

	/**
	 * @param string $country
	 */
	public function setCountry(string $country)
	{
		switch ($country) {
			case 'nederland':
			case 'belgië':
			case 'duitsland':
			case 'frankrijk':
			case 'spanje':
			case 'noord-korea':
			case 'italie':
			case 'luxemburg':
			case 'zwitserland':
			case 'oostenrijk':
				$this->country = $country;
				break;
			default:
				$this->country = 'nederland';
		}
	}

	public function getRecords()
	{
		return get_object_vars($this);

	}


}