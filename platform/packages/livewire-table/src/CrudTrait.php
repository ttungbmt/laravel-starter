<?php
namespace ttungbmt\Livewire\Table;

use Illuminate\Support\Arr;

trait CrudTrait {
    public function handleCreate() {
        if ($this->SPAMode) return redirect($this->getUrl() . '/?view=create');

        $this->create();
    }

    public function create() {
        $this->isNew = true;
        $this->view = 'create';
    }

    public function handleEdit($id) {
        if ($this->SPAMode) return redirect($this->getUrl() . '/?view=edit&id=' . $id);

        $this->isNew = false;
        $this->view = 'edit';

        $this->edit($id);
    }

    public function edit($id) {
        $record = $this->findModel($id);
        $this->fillForm($record);
    }

    public function handleSubmit() {
        $this->submit();
        if ($this->SPAMode) return redirect($this->getUrl());

        $this->resetForm();
        $this->view = 'index';
    }

    public function submit() {
        $this->validate($this->rules());

        $field_names = [];
        foreach ($this->fields() as $field) $field_names[] = $field->name;
        $formData = Arr::only($this->form, $field_names);

        if ($this->selected_id) {
            $record = $this->findModel($this->selected_id);
            $record->update($formData);
        } else {
            $record = $this->modelClass::create($formData);
        }

        $this->success();
    }

    public function destroy($id) {
        if ($id) {
            $record = $this->findModel($id);
            $record->delete();
        }
    }

    public function saveAndStay()
    {
        $this->submit();
        $this->saveAndStayResponse();
    }

    public function saveAndStayResponse()
    {

    }

    public function saveAndGoBack()
    {
        $this->submit();
        $this->saveAndGoBackResponse();
    }

    public function saveAndGoBackResponse()
    {
        return redirect('/geo-file');
    }
}