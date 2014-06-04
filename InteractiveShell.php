<?php

class InteractiveShell
{
	public $stdin;

	public function __construct()
	{
		$this->stdin = fopen('php://stdin', 'r');
		$this->read();
	}

	public function read()
	{
		$msg = fgets($this->stdin, 1024);
		$continue = $this->handle($msg);
		if ($continue) $this->read();
	}

	public function handle($msg)
	{
		switch ($msg) {
			case "quit\n":
				return false;
				break;

			default:
				echo "Sorry, your input isn't recognized...\n";

				return true;
				break;
		}
	}
}

?>
