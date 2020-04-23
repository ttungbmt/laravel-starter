{{--
<div class="container">
    @if($isIndex)
        <div>Index</div>
    @endif

    @if($isForm)

    @endif
</div>

--}}



<x-form method="POST" wire:submit.prevent="submit">
    <x-field-input label="Tiêu đề" placeholder="Nhập tiêu đề" name="name" />
    <button type="submit" class="btn btn-primary">Submit</button>
</x-form>

@push('scripts')
    <script>
        setTimeout(() => {
            let component = window.livewire.find(`{{$this->id}}`)
            console.log(component)
        }, 100)
    </script>
@endpush
