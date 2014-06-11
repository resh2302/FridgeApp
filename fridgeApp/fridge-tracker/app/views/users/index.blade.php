@extends('layouts.default')
@section('content')
        <h1>All Users</h1>
        @if($users->count())
            @foreach ($users as $user)
                <li> {{link_to("/users/{$user->email}", $user->email)}} </li>
                <!--<li> {{$user->Email}} </li>-->
            @endforeach
        @else
            <p> Unfortunately no users</p>
        @endif
 @stop
