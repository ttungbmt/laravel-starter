@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/admin/geo-file/47" method="POST">
            @csrf
            @method('PUT')
            <button type="submit"> Submit </button>
        </form>

        <livewire:geo-file/>
    </div>
@endsection

@push('scripts')

@endpush
