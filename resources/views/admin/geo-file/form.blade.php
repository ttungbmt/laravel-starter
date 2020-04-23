@extends('layouts.app')

@section('content')
    <div class="container">
        <livewire:geofile-form :model="$model"/>
    </div>
@endsection
