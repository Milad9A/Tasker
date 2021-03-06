@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.2/css/bulma.min.css">

@endsection

@section('content')

    <h1>Categories</h1>


    <div class="col-sm-6" style="margin-top: 16px">

        <form method="POST" action="/admin/categories">
            @csrf

            <div class="field">
                <label for="name">Name</label>

                <div class="control">
                    <input
                        class="input @error('name') is-danger @enderror"
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                    >

                    @error('name')
                    <p class="help is-danger">{{ $errors->first('name') }}</p>
                    @enderror
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </div>

        </form>

    </div>

    <div class="col-sm-6" style="margin-top: 16px">

        @if($categories)
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $category)

                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No date available'}}</td>
                        <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : 'No date available'}}</td>
                    </tr>

                @endforeach

                </tbody>
            </table>

    </div>

    @endif

@stop
