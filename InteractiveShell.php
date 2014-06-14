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
		fputs($this->stdin, '>>> ');
		$msg = fgets($this->stdin, 1024);
		$continue = $this->handle($msg);
		if ($continue) $this->read();
	}

	public function handle($msg)
	{
		if (preg_match('/^=/', $msg)) $msg = preg_replace('/^=/', 'return', $msg);
		if ( ! preg_match('/;$/', $msg)) $msg .= ';';

		try {
			$_out = eval($msg);

			echo $_out."\n";
		} catch (Exception $e) {
			echo "ERROR";
		}
	}
}

$anim = ['|', '/', '-', '\\'];
$frame = 0;
$ellip = ['   ', '.  ', '.. ', '...'];

/** /
while (++$frame) {
	if ($frame > 3) $frame = 0;
	// echo "  uploading {$ellip[$frame]} {$anim[$frame]}\r";
	echo "{$anim[$frame]}\r";
	usleep(62500);
}
/**/

$I = new InteractiveShell;

while (1) {
	$I->read();
}
