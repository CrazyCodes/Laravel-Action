<?php
	
	namespace Examples;
	
	use CrazyCodes\Facades\Action;
	
	/**
	 * Class UserController
	 * @package Examples
	 */
	class UserController
	{
		public function create()
		{
			$request = [
				'username' => 'test',
				'password' => 'test',
			];
			
			$result = Action::use ('CreateUser', $request);
			
			//全局方法
			//laravel_action ('CreateUser', $request);


//			return $result->toArray();
			return $result->toJson ();
		}
	}