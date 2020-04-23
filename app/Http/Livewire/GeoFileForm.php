<?php

namespace App\Http\Livewire;

use App\GeoFile;
use Livewire\Component;

class GeoFileForm extends Component
{
    public $name;
    public $model;
//    public $v;
//    public $count = 0;

    public function mount(GeoFile $model){
        $this->model = $model;
//        $this->fill(['v' => $this->model->toArray()]);

    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required'
        ]);

        $this->model->create($data);

        return redirect('/geo-file-form/'.$this->model->id);
    }

    public function render()
    {
        return view('livewire.geo-file-form');
    }
}
