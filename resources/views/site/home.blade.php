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

    <!-- Main Content -->
    @foreach($posts as $post)

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-preview">
                        <a href="{{ route('site.show', ['post' => $post]) }}">
                            <h2 class="post-title">
                                {{$post->title}}
                            </h2>
                        </a>
                        <p class="post-meta">Posted by
                            <a href="#">{{$post->author->name}}</a>
                        </p>
                        @foreach($post->categories as $category)
                            <p class="post-meta">
                                <a href="#">{{$category->name}}</a>
                            </p>
                        @endforeach
                    </div>
                    <hr>
                </div>
            </div>
        </div>

    @endforeach

    <hr>
    <form method="GET" action="/">
        @csrf

        <div class="row "
             style="
            width: 80%;
            margin: 0 auto;
            padding: 25px;
            background: whitesmoke"
        >

            <div class="select is-multiple control" style="margin-right: 15px">

                <select name="categories[]" multiple>
                    @foreach(App\Category::all() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                @error('categories')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Filter by Categories</button>
                </div>
            </div>
        </div>
    </form>


@endsection
