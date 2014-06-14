<?php

class Shell
{
	static $input;

	static function open()
	{
		return static::$input = fopen('php://stdin', 'r');
	}

	static function push($msg)
	{
		fputs(static::$input, $msg);
	}

	static function pull()
	{
		return fgets(static::$input, 1024);
	}

	static function close()
	{
		return fclose(static::$input);
	}
}
