@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.2/css/bulma.min.css">

@endsection

@section('content')

    <div class="row">

        <div class="col-sm-3">
            <img src="{{$post->image}}" alt="" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">
            <div id="wrapper">
                <div id="page" class="container">
                    <h1 class="heading has-text-weight-bold is-size-4">Edit the Post</h1>

                    <form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data">
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
                            <label for="user_id">Author</label>

                            <div class="select">
                                <select name="user_id">
                                    @foreach($authors as $author)
                                        <option value="{{$author->id}}">{{$author->name}}</option>
                                    @endforeach
                                </select>

                                @error('user_id')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <label for="body">Body</label>

                            <div class="control">
                                <input
                                    class="input"
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
                            <a href="{{ route('admin.posts.destroy', ['post' => $post]) }}">
                                <div class="control">
                                    <button class="button btn-danger" type="submit">Delete Post</button>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

@stop
