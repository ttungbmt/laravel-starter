<?php
namespace App\Http\Livewire;

use App\GeoFile as GeoFileModel;
use Kdion4891\LaravelLivewireForms\Field;
use ttungbmt\Livewire\Form\Fields\Select;
use ttungbmt\Livewire\Form\Fields\Text;
use ttungbmt\Livewire\Form\View\Components\Row;
use ttungbmt\Livewire\Table\Column;
use ttungbmt\Livewire\Table\SPACrudComponent;


class GeoFile extends SPACrudComponent {
    protected $modelClass = GeoFileModel::class;

    public function columns() {
        return [
            Column::make('#', 'id'),
            Column::make('Tên', 'name')->searchable(),
            Column::make('Mã', 'code')->searchable(),
            Column::make('Hành động')->view('livewire-table::actions'),
        ];
    }

    public function fields()
    {
        $options = [1 => 'Hello'];

        return [
//            Field::make('Tên', 'name')->select($options)->rules('required'),
            Text::make('Tên', 'name')
                ->attr('x-data', 'datepicker()')
                ->attr('x-init', 'init($el)')
                ->rules('required')
                ->placeholder('Nhập tên'),
            Select::make('Mã', 'code')->options($options)->rules('required')->placeholder('Chọn mã...'),
        ];
    }

}
