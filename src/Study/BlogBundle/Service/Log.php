<?php
// src/Study/BlogBundle/Service/Log.php

namespace Study\BlogBundle\Service;

class Log
{
	protected $file_name;
	
	/**
	 * Construct
	 */
	public function __construct() {
		$this->file_name = __DIR__.'/../../../../web/filelog/log.txt';
	}
	/**
	 * Get $file_name
	 */
	public function getFileName() {
		return $this->file_name;
	}


	/**
	 * Write log to file
	 * @param: string $file_name
	 * @author: Harrison
	 */
	public function writelog($stext)
	{
		$fname_file = fopen($this->getFileName(), 'a') or die("Can't open file");
		fwrite($fname_file, date('m/d/Y h:i:s a', time()) . ' : ' . $stext . "\r\n");
		fclose($fname_file);
	}
}
