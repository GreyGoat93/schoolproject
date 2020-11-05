@extends('layouts.management')

@section('content')
<div class="container">
    <table class="w-100">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Role Id</th>
            <th>E-Mail</th>
        </tr>
    @foreach($users as $user)
        <tr data-id="{{$user->id}}">
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->gender}}</td>
            <td>{{$user->role_id}}</td>
            <td>{{$user->email}}</td>
        </tr>
    @endforeach
    </table>
<div>
@endsection