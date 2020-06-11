@extends('layouts.site')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.2/css/bulma.min.css">

@endsection

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
            <h1 class="heading has-text-weight-bold is-size-4">Edit Post</h1>

            <form method="POST" action="/{{$post->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="field">
                    <label for="title">Title</label>

                    <div class="control">
                        <input
                            class="input"
                            type="text"
                            name="title"
                            id="title"
                            value="{{ $post->title }}"
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
                            value="{{ $post->body }}"
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

            <div style="margin-top: 14px">
                <div class="field is-grouped">
                    <a href="{{ route('site.destroy', ['post' => $post]) }}">
                        <div class="control">
                            <button class="button btn-danger" type="submit">Delete Post</button>
                        </div>
                    </a>
                </div>
            </div>

        </div>

    </div>

@stop
