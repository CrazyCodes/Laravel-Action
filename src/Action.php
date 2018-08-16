<?php
	
	namespace CrazyCodes;
	
	abstract class Action implements ActionInterface
	{
		public $beforeResultName = 'beforeResult';
		
		public $afterResultName = 'afterResult';
		
		public function before($request)
		{
			return [];
		}
		
		public function after($request)
		{
			return [];
		}
	}