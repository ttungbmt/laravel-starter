<?php

namespace App\Http\Livewire;

use App\GeoFile;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

/**
 * @property mixed model
 */
class AppForm extends Component
{
    public $model;
    public $v;

    public function mount(GeoFile $model){
        $this->model = $model;

        $this->fill(['v' => $this->model->toArray()]);
    }


    public function submit()
    {
        $this->validate([
            'v.title' => 'required',
            'v.code' => 'required'
        ]);

        $this->model->fill($this->v);
        $this->model->save();
    }

    public function render()
    {
        return view('livewire.app-form', [
            'model' => $this->model
        ]);
    }
}
