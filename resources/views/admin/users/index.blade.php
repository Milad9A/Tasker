@extends('layouts.admin')

@section('content')

<h1>All Users</h1>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Profile Pic</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
    </thead>
    <tbody>

        @if($users)
        @foreach($users as $user)

        <tr>
            <td><a href="{{ route('admin.users.edit', compact('user')) }}">{{$user->id}}</a></td>
            <td>
                <a href="{{ route('admin.users.edit', compact('user')) }}">
                    <img
                    height="60"
                    src="{{ $user->image }}"
                    alt="">
                </a>
            </td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->created_at->diffForhumans()}}</td>
            <td>{{$user->updated_at->diffForhumans()}}</td>
        </tr>

        @endforeach
        @endif

    </tbody>
</table>

{{-- <div id="pag">
    <style>
        #pag {
            text-align: center;
        }
    </style>
    {{ $users->links() }}
</div> --}}

@stop
