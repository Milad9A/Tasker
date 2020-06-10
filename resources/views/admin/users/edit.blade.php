@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.2/css/bulma.min.css">

@endsection

@section('content')

    <div class="row">

        <div class="col-sm-3">
            <img src="{{$user->image}}" alt="" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">
            <div id="wrapper">
                <div id="page" class="container">
                    <h1 class="heading has-text-weight-bold is-size-4">Edit the User</h1>

                    <form method="POST" action="/admin/users/{{$user->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="field">
                            <label for="name">Name</label>

                            <div class="control">
                                <input
                                    class="input"
                                    type="text"
                                    name="name"
                                    id="name"
                                    value="{{ $user->name }}"
                                >

                                @error('name')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <label for="email">Email</label>

                            <div class="control">
                                <input
                                    class="input"
                                    name="email"
                                    id="email"
                                    value="{{ $user->email }}"
                                >

                                @error('email')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <label for="password">Password</label>

                            <div class="control">
                                <input
                                    class="input"
                                    name="password"
                                    id="password"
                                    type="password"
                                >

                                @error('password')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <label for="image">Image</label>

                            <div class="control">
                                <input
                                    class="fa-file"
                                    name="image"
                                    id="image"
                                    type="file"
                                >

                                @error('image')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <label for="role">Role</label>

                            <div class="select">
                                <select name="role">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>

                                @error('role')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>

                    <div style="margin-top: 14px">
                        <div class="field is-grouped">
                            <a href="{{ route('admin.users.destroy', ['user' => $user]) }}">
                                <div class="control">
                                    <button class="button btn-danger" type="submit">Delete User</button>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

@stop
