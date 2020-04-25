<?php
//    dd($fields);
?>
<div class="panel panel-default">

    <div class="panel-heading">
        <h4 class="panel-title">{{$isNew ? __('Create') : __('Update')}} Geo File</h4>
    </div>

    <div class="panel-body">
        <x-form wire:submit.prevent="handleSubmit">
            @foreach($fields as $field)
                @if($field->type === 'text')
                    <x-field-input :w-bind="$field" :w-model="$field->key"/>
                @elseif($field->type === 'select')
                    <x-field-select :w-bind="$field" :w-model="$field->key"/>
                @endif

            @endforeach

            <button type="button" wire:click="cancel" class="btn btn-danger">{{__('Cancel')}}</button>
            <button type="submit" class="btn btn-primary">{{$isNew ? __('Create') : __('Update')}}</button>
        </x-form>
    </div>
</div>

