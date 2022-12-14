@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('medicine.partials.navigation')

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('My medicine') }}</div>
                <div class="card-body">
                    <ul>
                        @foreach($medicine as $med)
                            <li>
                                {{ $med->name }} - {{ $med->number_of_items_left }}
                                <ul>
                                    @foreach($med->schedules as $schedule)
                                        <li>{{ $schedule->date }} {{ $schedule->time }}: {{ $schedule->number_of_items_to_take }}</li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
