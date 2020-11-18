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
            <td><a href="{{route('user.show', ['id' => $user->id])}}" class="text-danger">{{$user->first_name}}</a></td>
            <td><a href="{{route('user.show', ['id' => $user->id])}}">{{$user->last_name}}</a></td>
            <td><a href="{{route('user.show', ['id' => $user->id])}}">{{$user->gender}}</a></td>
            <td><a href="{{route('user.show', ['id' => $user->id])}}">{{$user->role_id}}</a></td>
            <td><a href="{{route('user.show', ['id' => $user->id])}}">{{$user->email}}</a></td>
        </tr>
    @endforeach
    </table>
<div>
@endsection