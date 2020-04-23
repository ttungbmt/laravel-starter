<div>
    @if($summaryErrors) <x-form-alert /> @endif

    <form {{$getAttrs($attributes)}}>
        @csrf
        @if(!$isGetOrPost) @method($method) @endif

        {{$slot}}
    </form>
</div>


@push('scripts')

@endpush
