<?php
namespace ttungbmt\Livewire\Form\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use ttungbmt\Livewire\Form\View\Components\Form;
use ttungbmt\Livewire\Form\View\Components\FormAlert;
use ttungbmt\Livewire\Form\View\Components\Input;
use ttungbmt\Livewire\Form\View\Components\Row;
use ttungbmt\Livewire\Form\View\Components\Select;

class FormServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'livewire-form');

        Blade::component('form', Form::class);
        Blade::component('form-alert', FormAlert::class);
        Blade::component('row', Row::class);
        Blade::component('field-input', Input::class);
        Blade::component('field-select', Select::class);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/livewire-form.php', 'livewire-form');

    }
}