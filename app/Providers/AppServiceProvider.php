<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//Add the schema facade
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use App\View\Components\Alert as AlertComponent;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{

		Blade::component('alert', AlertComponent::class);

		//Provide migration string() function default value.
		Schema::defaultStringLength(191);

		//Register laravel telescope service provider only when the application is in local environment
		if ($this->app->isLocal()) {
			$this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
			$this->app->register(TelescopeServiceProvider::class);
		}

	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}
}