<?php
namespace App\Http\Livewire;
use Kdion4891\LaravelLivewireForms\Field;
use ttungbmt\Livewire\Table\Column;
use ttungbmt\Livewire\Table\SPACrudComponent;

class GeoFileForm extends SPACrudComponent
{
    public function columns() {
        return [
            Column::make('Id'),
            Column::make('Name'),
        ];
    }

    public function fields()
    {
        return [
            Field::make('Name')->input()->rules('required'),
        ];
    }
}
