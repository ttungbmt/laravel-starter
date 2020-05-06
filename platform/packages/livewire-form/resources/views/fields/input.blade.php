<div class="form-group">
    @include('livewire-form::fields.label', ['field' => $field])
    <div class="input-group">
        @if($prepend = $field->prepend)
            <div class="input-group-prepend">
                <span class="input-group-text">{{$prepend}}</span>
            </div>
        @endif

        <input {{$getAttrs($attributes, $errors)}}>

        @if($append = $field->append)
            <div class="input-group-append">
                <span class="input-group-text">{{$append}}</span>
            </div>
        @endif
    </div>

    @include('livewire-form::fields.error-help', ['field' => $field])

</div>

