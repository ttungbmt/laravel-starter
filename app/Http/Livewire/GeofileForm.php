<?php

namespace App\Http\Livewire;

use App\GeoFile;
use Livewire\Component;

class GeofileForm extends Component
{
    public $name;
    public $model;

    public $isIndex;
    public $isForm;

    public function mount(GeoFile $model = null)
    {
        $this->model = $model;
        $this->updateView();
    }

    protected function updateView(){
        $this->isIndex = false;
        $this->isForm = true;
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|email',
        ]);

    }

    public function render()
    {
        return view('livewire.geofile-form');
    }

    public function isIndex(){
        return true;
    }

    public function isForm(){
        return true;
    }
}
