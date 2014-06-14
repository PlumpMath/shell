<?php

class Shell
{
	static $input;
	static $ps = '>>> ';

	static function prompt()
	{
		static::push(static::$ps);
		return substr(fgets(static::$input, 1024), strlen($ps));
	}

	static function start()
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

	static function stop()
	{
		return fclose(static::$input);
	}
}
