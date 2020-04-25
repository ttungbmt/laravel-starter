<div class="form-group">
    @include('livewire-form::fields.label', ['field' => $field])

    <select {{$getAttrs($attributes, $errors)}}>
        @if($field->placeholder)
            <option value="">{{ $field->placeholder }}</option>
        @endif


        @if(is_array($field->options))
            @foreach($field->options as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
        @endif

    </select>

    @error($field->key)
        <div class="invalid-feedback">{!! $message !!}</div>
    @elseif($field->help)
        <small class="form-text text-muted">{!! $field->help !!} </small>
    @enderror
</div>