@extends('layouts.management')

@section('content')

@php
    $roleName = null;
    $student = null;
    $classroom = null;

    switch($user->role_id){
        case 1:
            $roleName = 'Manager';
        break;
        case 2:
            $roleName = 'Teacher';
        break;
        case 3:
            $roleName = 'Student';
            $student = App\Models\Student::where('user_id', $user->id)->first();
            $classroom = $student->classroom ?? 'null';
        break;
    }

@endphp

<div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            <h2>{{$user->first_name}} {{$user->last_name}}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <h3>{{$roleName}}</h3>
        </div>
    </div>
    @if($user->role_id == 3)
    <div class="row mt-md-3">
        <div class="col-md-2 d-flex align-items-center">
            <h3 class="pt-md-1" id="classInfo">Class: {{$student->grade}}/{{$classroom->branch ?? 'null'}}</h3>
        </div>
        <div class="col-md-2 d-flex align-items-center">
            <button class="btn btn-primary" id="btnBranch">Change Classroom</button>
        </div>
        <form class="col-md-2 d-none" id="formClassroom" action="route('')">
            <div class="form-group">
                <label for="classroom">Branch:</label>
                <select id="classroom" class="form-control">

                </select>
                
            </div> 
            <div class="form-group">
                <button id="btnSubmit" class="btn btn-secondary">Update</button>
            </div>
        <form>
    </div>
    @endif
</div>

@if($user->role_id == 3)
<script>

    let grade = '{{$student->grade}}';
    $('#btnBranch').click(function(){
        $('#formClassroom').removeClass('d-none')

        $.ajax({
            url: "/management/classroombygrade/" + grade,
            async: false,
            error: function(response){
                console.log(response)
            },
            success: function(response){
                $('#classroom')[0].innerHTML = response
            }
        });
    });

    $('#btnSubmit').click(function(){
        event.preventDefault();

        let classroom = $('#classroom')[0].value;
        let branch = $('#classroom option:selected')[0].innerHTML;

        $.ajax({
            url:  "/management/users/" + {{$student->id}} + "/editclassroom",
            type: "PUT",
            data: {
                _token: "{{@csrf_token()}}",
                classroom: classroom
            },
            success: function(response){
                $('#classInfo')[0].innerHTML = "Class: " + grade + "/" + branch;
                console.log(response);
            },
            error: function(response){
                console.log(response);
            }
        })
    })
</script>
@endif
    
@endsection