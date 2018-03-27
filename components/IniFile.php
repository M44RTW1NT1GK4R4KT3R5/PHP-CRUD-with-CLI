<?php

class IniFile
{
	private $ini;
	private $file;

	public function __construct($file = null)
	{
		if (!empty($file)) {
			$this->file = __DIR__ . '/data/' . $file;
			$this->ini = parse_ini_file($this->file);
			if (!$this->ini) {
				return false;
			}
			return true;
		}
		return false;
	}

	public function getParameter($key)
	{
		if (isset($this->ini[$key])) {

			return $this->ini[$key];
		}
		return false;
	}

	public function setParameter($key, $value)
	{
		$this->ini[$key] = $value;
	}

	public function UpdateIniFile()
	{
		$newline = '';
		foreach ($this->ini as $k => $v) {

			if ($v == '1') {
				$newline .= "$k=true\n";
				continue;
			} elseif ($v == '0') {
				$newline .= "$k=false\n";
				continue;
			}
			$newline .= "$k='$v'\n";
		}
		file_put_contents($this->file, $newline);
	}
}