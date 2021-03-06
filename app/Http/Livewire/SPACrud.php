<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Kdion4891\LaravelLivewireTables\TableComponent;
use Livewire\Component;

class SPACrud extends TableComponent {
    public $checkbox = false;
    public $checkbox_side = 'left';

    protected $modelClass;
    protected $SPAMode = false;

    public $per_page = 25;
    public $selected_id;
    public $form = [];
    public $isNew = true;

    public $view = 'index';

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

    public function create() {
        $this->isNew = true;
        $this->view = 'create';
    }

    public function edit($id) {
        $record = $this->findModel($id);
        $this->fillForm($record);
    }

    public function submit() {

    }


    public function destroy($id) {
        if ($id) {
            $record = $this->findModel($id);
            $record->delete();
        }
    }

    public function cancel() {
        if (request('view')) {
            return redirect($this->getUrl());
        }

        $this->view = 'index';
        $this->resetForm();
    }

    public function handleCreate() {
        if ($this->SPAMode) return redirect($this->getUrl() . '/?view=create');

        $this->create();
    }

    public function handleEdit($id) {
        if ($this->SPAMode) return redirect($this->getUrl() . '/?view=edit&id=' . $id);

        $this->isNew = false;
        $this->view = 'edit';

        $this->edit($id);
    }

    public function handleSubmit() {
        $this->submit();
        if ($this->SPAMode) return redirect($this->getUrl());

        $this->resetForm();
        $this->view = 'index';
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


}