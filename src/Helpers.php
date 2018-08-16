<?php
	
	use CrazyCodes\Facades\Action;
	
	if (!function_exists ('laravel_action')) {
		function laravel_action($className, $request = [])
		{
			return Action::use ($className, $request);
		}
	}