<?php

class EntityGenerator
{
	private $name;
	private $vars;

	public function __construct($name)
	{
		$this->vars = [];
		$this->name = ucfirst($name);
	}

	private function checkIfExists($varName):bool {

		foreach ($this->vars as $var){

			if ($var == $varName){
				return true;
			}
		}
		return false;
	}

	public function addVar($varName)
	{
		if (!$this->checkIfExists($varName)){
			$this->vars[] = $varName;
		}else{
			echo 'already exists.'.PHP_EOL;
		}
	}

	public function generateEntity()
	{
		$stringBuilder = <<<TXT
<?php

class $this->name implements Entity
{
	private \$id;\n
TXT;
		foreach ($this->vars as $var){

			$stringBuilder .= <<<TXT
	private $$var;\n
TXT;
		}
		$stringBuilder.=<<<TXT

	public function getId(): int
	{
		return \$this->id;
	}
	
TXT;
		foreach ($this->vars as $var){
			$funcName = ucfirst($var);
			$stringBuilder .= <<<TXT

	public function get$funcName()
	{
		return \$this->$var;
	}

	public function set$funcName(\$$var)
	{
		\$this->$var = \$$var;
		
		return \$this->$var;
	}

TXT;
		}

		$stringBuilder.= <<<TXT
}
TXT;

		file_put_contents(__DIR__.'/'.$this->name.'.php',$stringBuilder);
	}
}