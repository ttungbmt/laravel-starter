<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\GeoFile as GeoFileModel;

class Test extends Component
{
    public $data, $name, $selected_id;
    public $updateMode = false;

    public function render()
    {
        $this->data = GeoFileModel::all();
        return view('livewire.test');
    }

    public function edit($id)
    {
        $record = GeoFileModel::findOrFail($id);

        $this->selected_id = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }
}
