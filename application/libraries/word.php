<?php 
	if(!defined('BASEPATH')) 
		exit('No direct script access allowed');
	require_once APPPATH . 'libraries/PHPWord/src/PhpWord/Autoloader.php';
	use PhpOffice\PhpWord\Autoloader as Autoloader;
	use \PhpOffice\PhpWord\PhpWord as PhpWord;
	Autoloader::register();
	class Word extends PhpWord
	{
		public function __construct(){
			parent::__construct();
		}
	}