@extends('layouts.site')


@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Tasker</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">Add a Post</h1>

            <form method="POST" action="/" enctype="multipart/form-data">
                @csrf

                <div class="field">
                    <label for="title">Title</label>

                    <div class="control">
                        <input
                            class="input"
                            type="text"
                            name="title"
                            id="title"
                            value="{{ old('title') }}"
                        >

                        @error('title')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="body">Body</label>

                    <div class="control">
                        <input
                            class="input"
                            type="text"
                            name="body"
                            id="body"
                            value="{{ old('body') }}"
                        >

                        @error('body')
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
                            value="{{ old('image') }}"
                        >

                        @error('image')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="category">Categories</label>

                    <div class="select is-multiple control">
                        <select name="categories[]" multiple>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>

                        @error('categories')
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

        </div>

    </div>

@stop
