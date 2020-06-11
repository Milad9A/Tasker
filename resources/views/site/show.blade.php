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

    <div class="container">
        <div class="row">
            <div class="post-preview">
                <div class="row justify-content-sm-between" style="width: 150px">
                    <h2 class="post-title">
                        {{$post->title}}
                    </h2>

                    @can('update', $post)
                    <a href="{{ route('site.edit', ['post' => $post]) }}">
                        <img src="/img/edit.png" alt="" width="25px">
                    </a>
                    @endcan
                </div>
                <p class="post-meta">Posted by
                    <a href="#">{{$post->author->name}}</a>
                </p>
                <img src="{{ $post->image }}" alt="" width="1000px">
                <p>
                    {{ $post->body }}
                </p>
                <hr>
            </div>

            <div class="col">
                <div class="col">
                    @foreach($comments as $comment)
                        <p> {{ $comment->author->name . ':'}} <br> {{ $comment->body }} </p>
                    @endforeach
                </div>


                <div class="row">
                    <form method="POST" action="/comments">
                        @csrf

                        <div class="field">
                            <label for="title">Add a Comment</label>

                            <input type="hidden"
                                   name="post_id"
                                   value="{{ $post->id }}"
                            >

                            <div class="control">
                                <input
                                    class="input"
                                    type="text"
                                    name="body"
                                    id="body"
                                >

                                @error('body')
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

        </div>
    </div>

@stop
