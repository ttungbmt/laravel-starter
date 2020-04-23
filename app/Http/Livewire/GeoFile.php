<?php
namespace App\Http\Livewire;

use App\GeoFile as GeoFileModel;

class GeoFile extends SPACrud {
    protected $modelClass = GeoFileModel::class;

    public function render() {
        return $this->view('livewire.geo-file.component');
    }

    public function submit() {
        $data = $this->validate([
            'form.name' => 'required'
        ]);

        $formData = data_get($data, 'form');

        if ($this->selected_id) {
            $record = $this->findModel($this->selected_id);
            $record->update($formData);
        } else {
            $record = $this->modelClass::create($formData);
        }
    }
}
