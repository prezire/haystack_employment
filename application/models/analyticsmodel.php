<?php	
  class AnalyticsModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			//
		}
		public final function email()
		{
			//CRON?
		}
		public final function createEmailer()
		{
			//
		}
		public final function readEmailers()
		{
			//
		}
		public final function deleteEmailer($id)
		{
			//
		}
		/*
			@param  $options  Array of the following items:
			 - frequency String  Daily (Default), Weekly, Monthly.
			 - geographic String  Country. Optional
			 - industry  String. Required. Default is null.
			 - from Date. Required. Default is today - 1.
			 - to Date. Required. Default is today.
		*/
		public final function generate($options)
		{
			$o = $options;

		}
	}