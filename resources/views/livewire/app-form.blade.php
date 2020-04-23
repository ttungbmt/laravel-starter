<div class="container">
    <x-form :model="$model" id="geoFileForm" method="POST" wire:submit.prevent="submit" summaryErrors>
        <x-field-input :model="$model" label="Tiêu đề" name="title" w-model="v.title"/>
        <x-field-input :model="$model" label="Mã file" name="code" w-model="v.code"/>

        <button type="submit" class="btn btn-primary">Submit</button>
    </x-form>
</div>
