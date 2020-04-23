<div class="container">
    <form wire:submit.prevent="submit">
        <x-field-input label="Tên" name="name" w-model="name"/>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

  {{--  <x-form id="geoFileForm" method="POST" wire:submit.prevent="submit" summaryErrors>
        --}}{{--<x-field-input label="Tên" name="name" w-model="v.name"/>--}}{{--
        --}}{{--<x-field-input label="Mã file" name="code" w-model="v.code"/>--}}{{--

        <button type="submit" class="btn btn-primary">Submit</button>
    </x-form>--}}
</div>
