<?php
	
	namespace Examples;
	
	use CrazyCodes\Action;
	
	/**
	 * 创建用户钱包
	 * Class CreateWallet
	 * @package Examples
	 */
	class CreateWallet extends Action
	{
		public function before($request)
		{
			var_dump ($request);
			
			return ['status' => 'success'];
		}
		
	}