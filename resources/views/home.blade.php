@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <hr>


    <livewire:app-form :model="$model"/>



</div>
@endsection
@push('vue')
   {{-- <script>
        let file
        Vue.component('v-app', {
            data() {
                return {
                    m: @json($files)
                }
            },
             methods: {
                 submit(e){
                    axios.post('/home', {
                        data: {
                            ...this.m
                        }
                    })
                 }
             }
        })
    </script>--}}
@endpush

