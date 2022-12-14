@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('medicine.partials.navigation')

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Add new medicine') }}</div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
