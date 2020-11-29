@extends('layouts.management')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <h2>{{$classroom->grade}}/{{$classroom->branch}}</h2>
        </div>
        <div class="row mt-5">
            <h3>Lessons:</h3>
        </div>
        <div>
            @if($lessons != null)
                @foreach($lessons as $lesson)
                <div class="">
                    <div class="d-inline">{{ucfirst($lesson->name)}}</div>
                    <div class="d-inline">{{$lesson->teacherFN}} {{$lesson->teacherLN}}</div>
                    <div class="d-inline">{{$lesson->id}}</div>
                </div>
                @endforeach
            @else
                <div>This classroom has no class at the moment.</div>
            @endif
        </div>
    </div>
@endsection