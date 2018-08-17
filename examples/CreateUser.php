<?php
	
	namespace Examples;
	
	use CrazyCodes\Action;
	
	/**
	 * Class CreateUser
	 * 创建用户
	 * @package Examples
	 */
	class CreateUser extends Action
	{
		public function before($request)
		{
			var_dump ($request);
			
			return ['status' => 'success'];
		}
		
		public function after($request)
		{
			var_dump ($request);
			
			return Action::use ('CreateWallet', $request);
		}
	}