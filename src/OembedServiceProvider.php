<?php namespace Simexis\Oembed;

use Illuminate\Support\ServiceProvider;

/**
 * Class OembedServiceProvider
 */
class OembedServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Boot the package.
	 * 
	 * @return void
	 */
	public function boot()
	{

	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('oembed', function ($app)
		{
			return new Oembed(new Embed, $app['cache']);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('oembed');
	}

}
