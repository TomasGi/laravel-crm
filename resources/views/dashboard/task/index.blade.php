@extends('dashboard.base')


@section('content')

    <div id="tasklist">
        @foreach ($tasks as $task)
            <div class="task">
                <div tooltip='{{ $task->status }}' tooltip-position='top' class="status-bouble id-{{ $task->status }}"></div>
                {{-- <div class="status">
                </div> --}}
                <div class="info">
                    <h4 class="device">
                        {{ $task->device }}
                    </h4>
                    <div class="description">
                        {{ $task->description }}
                    </div>
                </div>
                <div class="assigned">
                    <i class="material-icons">person</i>
                    <span>Name Lastname</span>
                </div>
            </div>
        @endforeach
        
    </div>

    
@endsection
