@extends('layouts.admin')

@section('content')

    <h1>All Posts</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Image</th>
            <th>Title</th>
            <th>Body</th>
            <th>Categories</th>
            <th>Comments</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($posts)
            @foreach($posts as $post)

                <tr>
                    <td><a href="{{ route('admin.posts.edit', compact('post')) }}">{{$post->id}}</a></td>
                    <td><a href="{{ route('admin.users.edit', ['user' => $post->author]) }}">{{$post->author->name}}</a></td>
                    <td>
                        <a href="{{ route('admin.posts.edit', compact('post')) }}">
                            <img
                                height="60"
                                src="{{ $post->image }}"
                                alt="">
                        </a>
                    </td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>
                        @if ($post->categories)
                            @foreach($post->categories as $category)
                                <a href="{{ route('admin.categories.edit', $category->id) }}">{{ $category->name . ' ' }}</a>
                            @endforeach
                        @endif
                    </td>
                    <td><a href="{{ route('admin.comments.index', ['post_id' => $post->id]) }}">view</a></td>
                    <td>{{$post->created_at->diffForhumans()}}</td>
                    <td>{{$post->updated_at->diffForhumans()}}</td>
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
