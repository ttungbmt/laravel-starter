<?php
namespace ttungbmt\Livewire\Table\Providers;

use Illuminate\Support\ServiceProvider;

class TableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'livewire-table');

        $this->publishes([__DIR__ . '/../../config/livewire-tables.php' => config_path('laravel-livewire-tables.php')], 'table-config');
        $this->publishes([__DIR__ . '/../../resources/views' => resource_path('views/vendor/laravel-livewire-tables')], 'table-views');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/livewire-tables.php', 'livewire-tables');
    }
}