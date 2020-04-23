<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">{{$isNew ? __('Create') : __('Update')}} Geo File</h4>
    </div>

    <div class="panel-body">
        <x-form-alert />

        <form wire:submit.prevent="handleSubmit">
            <x-field-input label="Tên" w-model="form.name"/>

            <button type="button" wire:click="cancel()" class="btn btn-danger">{{__('Cancel')}}</button>
            <button type="submit" class="btn btn-primary">{{$isNew ? __('Create') : __('Update')}}</button>
        </form>
    </div>
</div>