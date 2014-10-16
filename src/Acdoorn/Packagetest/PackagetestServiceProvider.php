<?php namespace Acdoorn\Packagetest;

use Illuminate\Support\ServiceProvider;

class PackagetestServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('acdoorn/packagetest');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['Packagetest'] = $this->app->share(function($app)
		{
			return new Packagetest;
		});
		$this->app->booting(function() {
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Packagetest', 'Acdoorn\Packagetest\Facades\Packagetest');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('packagetest');
	}

}
