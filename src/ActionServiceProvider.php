<?php
	
	namespace CrazyCodes;
	
	use Illuminate\Support\ServiceProvider;
	
	class ActionServiceProvider extends ServiceProvider
	{
		public function boot()
		{
			$this->publishes ([
				__DIR__ . '/Config.php' => config_path ('laravel-action.php'),
			], 'config');
		}
		
		public function register()
		{
			$this->app->singleton (ActionFacade::class, function () {
				return new ActionFacade();
			});
			
			$this->app->alias (ActionFacade::class, 'Action');
		}
	}