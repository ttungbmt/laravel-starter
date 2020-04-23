<div class="form-group">
    @if($label)
        <label>{{$label}}</label>
    @endif
    <div class="input-group">
        @if($prepend)
            <div class="input-group-prepend">
                <span class="input-group-text">{{$prepend}}</span>
            </div>
        @endif

        <input {{$getAttrs($attributes, $errors)}} value="{{old('v.'.$name)}}">

        @if($append)
            <div class="input-group-append">
                <span class="input-group-text">{{$append}}</span>
            </div>
        @endif

        @error('v.'.$name)
            <div class="invalid-feedback">{!! $message !!} </div>
        @enderror
    </div>



    {{ $slot }}
</div>


@push('scripts')
    <script>

    </script>
@endpush

