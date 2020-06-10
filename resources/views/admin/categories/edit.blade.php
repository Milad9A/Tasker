@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.2/css/bulma.min.css">

@endsection

@section('content')

    <h1>Edit Comment</h1>

    <div>

        <form method="POST" action="/admin/categories/{{$category->id}}" style="margin-top: 10px">
            @csrf
            @method('PUT')

            <div class="field">
                <label for="name">Name</label>

                <div class="control">
                    <input
                        class="input @error('name') is-danger @enderror"
                        type="text"
                        name="name"
                        id="name"
                        value="{{ $category->name }}"
                    >

                    @error('title')
                    <p class="help is-danger">{{ $errors->first('name') }}</p>
                    @enderror
                </div>

                <div class="field is-grouped" style="margin-top: 10px">
                    <div class="control">
                        <button class="button is-link" type="submit">Update</button>
                    </div>
                </div>

            </div>
        </form>

        <div style="margin-top: 10px">
            <div class="field is-grouped">
                <a href="{{ route('admin.categories.destroy', ['category' => $category]) }}">
                    <div class="control">
                        <button class="button btn-danger" type="submit">Delete Category</button>
                    </div>
                </a>
            </div>
        </div>

    </div>



@stop
