<?php

namespace ttungbmt\Livewire\Table;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Kdion4891\LaravelLivewireForms\Traits\HandlesArrays;
use Kdion4891\LaravelLivewireForms\Traits\UploadsFiles;
use ttungbmt\Livewire\Form\Traits\FollowsRules;

class SPACrudComponent extends \Kdion4891\LaravelLivewireTables\TableComponent {
    use FollowsRules, UploadsFiles, HandlesArrays, CrudTrait;

    protected $SPAMode = false;
    protected $modelClass;
    public $checkbox = false;
    public $hasSearch = true;
    public $per_page;
    public $selected_id;

    public $form = [];
    public $isNew = true;

    public $view = 'index';

    private static $storage_disk;
    private static $storage_path;

    protected $listeners = ['fileUpdate'];

    public function mount($model = null) {
//        $this->fill($model);
    }

//    public function fill($model = null) {
////        $this->model = $model;
////        if ($model) $this->form_data = $model->toArray();
////
////        foreach ($this->fields() as $field) {
////            if (!isset($this->form_data[$field->name])) {
////                $array = in_array($field->type, ['checkbox', 'file']);
////                $this->form_data[$field->name] = $field->default ?? ($array ? [] : null);
////            }
////        }
//    }

    public function render() {
        if($this->view !== 'index') return $this->formView();

        return $this->tableView();
    }

    public function formView() {
        return view('livewire-table::form', [
            'fields' => $this->fields(),
        ]);
    }

    public function tableView()
    {
        return view('livewire-table::index', [
            'columns' => $this->columns(),
            'models' => $this->models()->paginate($this->per_page),
        ]);
    }

    public function fields() {
        return [];
    }


    public function columns(){
        return [];
    }

    public function query() {
        return $this->modelClass::query();
    }

    public function findModel($id) {
        return $this->modelClass::findOrFail($id);
    }

    protected function fillForm($data) {
        $formData = $data;
        if ($data instanceof Model) {
            $formData = $data->toArray();
            $this->selected_id = $data->id;
        }

        $this->fill(['form' => $formData]);
    }

    public function cancel() {
        if (request('view')) {
            return redirect($this->getUrl());
        }

        $this->view = 'index';
        $this->resetForm();
    }

    protected function view($path) {
        if (request()->isMethod('get')) {
            $id = request()->get('id');
            $view = request()->get('view');
            if ($view === 'create') {
                $this->SPAMode = false;
                $this->handleCreate();
            } elseif ($view === 'edit' && $id) {
                $this->SPAMode = false;
                $this->handleEdit($id);
            }
        }

        return view($path, [
            'data' => $this->modelClass::paginate($this->per_page)
        ]);
    }

    public function resetForm() {
        $this->form = [];
        $this->isNew = false;
        $this->resetError();
    }

    protected function getUrl() {
        return (string)Str::of(request()->getPathInfo())->replace('/livewire/message', '');
    }

    public function resetError() {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($field)
    {
        $this->validateOnly($field, $this->rules(true));
    }


    public function success()
    {

    }

//    public function errorMessage($message)
//    {
//        return str_replace('form data.', '', $message);
//    }
//
//

}