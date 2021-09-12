@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="shadow card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="m-1 d-flex">
                        @include('layouts.sidebar')
                        <div class="m-1 rounded shadow-sm col-md-9">B</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection