<?php
	
	namespace CrazyCodes;
	
	use CrazyCodes\Exceptions\ActionException;
	
	class ActionFacade
	{
		
		/**
		 * Laravel $app
		 *
		 * @var object
		 */
		protected $app;
		
		/**
		 * Get Action ClassName
		 *
		 * @var string
		 */
		protected $className = '';
		
		
		/**
		 * Get Action Request Post/Get Data
		 *
		 * @var array
		 */
		protected $request = [];
		
		
		/**
		 * Get Before Func Return Result
		 *
		 * @var array
		 */
		protected $beforeResult;
		
		
		/**
		 * Get After Func Return Result
		 *
		 * @var array
		 */
		protected $afterResult;
		
		/**
		 * Get Action Class
		 *
		 * @var \stdClass
		 */
		private $class;
		
		/**
		 * ActionFacade constructor.
		 *
		 */
		public function __construct()
		{
			$this->app = app ();
			
		}
		
		/**
		 * @param string $className
		 * @param array  $request
		 *
		 * @return $this
		 * @throws ActionException
		 */
		public function use($className = '', $request = [])
		{
			
			if (isset($className)) {
				$this->className = $className;
				$this->request   = $request;
				
				try {
					$this->__include ();
				} catch (ActionException $e) {
					throw new ActionException($e->getMessage ());
				}
				
				return $this;
			}
			
		}
		
		/**
		 * @return string
		 */
		public function toJson()
		{
			return json_encode ([
				$this->class->beforeResultName => $this->beforeResult,
				$this->class->afterResultName  => $this->afterResult,
			]);
		}
		
		/**
		 * @return array
		 */
		public function toArray(): array
		{
			return [
				$this->class->beforeResultName => $this->beforeResult,
				$this->class->afterResultName  => $this->afterResult,
			];
		}
		
		
		/**
		 * @throws ActionException
		 */
		protected function __include()
		{
			
			$this->className = config ('laravel-action.actionNamespace') . $this->className;
			
			if (!class_exists ($this->className)) {
				throw new ActionException('your class not undefined');
			}
			
			$this->class = $this->app->make ($this->className);
			
			if (!method_exists ($this->class, 'before')) {
				throw new ActionException('your before func not undefined');
			}
			
			$this->beforeResult = $this->class->before ($this->request);
			
			if (method_exists ($this->class, 'after')) {
				$this->afterResult = $this->class->after ($this->request);
			}
			
		}
		
		public function __destruct()
		{
			unset($this->class);
		}
		
	}