@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.2/css/bulma.min.css">

@endsection

@section('content')

    <h1>All Comments</h1>

    <div class="col-sm-3" style="margin-top: 16px">

        <form method="POST" action="/admin/comments">
            @csrf

            <div class="field">
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
                    <label for="post_id">Post</label>

                    <div class="select">
                        <select name="post_id">
                            @foreach($posts as $post)
                                <option value="{{$post->id}}">{{$post->id}}</option>
                            @endforeach
                        </select>

                        @error('post_id')
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
                        >

                        @error('body')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </div>

        </form>

    </div>


    <div class="col-sm-9" style="margin-top: 16px">

        @if($comments)
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Body</th>
                    <th>Post's Title</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
                </thead>
                <tbody>

                @if($comments)
                    @foreach($comments as $comment)

                        <tr>
                            <td><a href="{{ route('admin.comments.edit', $comment->id) }}">{{$comment->id}}</a></td>
                            <td>
                                <a href="{{ route('admin.comments.edit', $comment->author) }}">{{$comment->author->name}}</a>
                            </td>
                            <td>{{$comment->body}}</td>
                            <td>{{$comment->post->title}}</td>
                            <td>{{$comment->created_at ? $comment->created_at->diffForhumans() : 'No Date Available'}}</td>
                            <td>{{$comment->updated_at ? $comment->updated_at->diffForhumans() : 'No Date Available'}}</td>
                        </tr>

                    @endforeach
                @endif

                </tbody>
            </table>

        @endif

    </div>
    {{-- <div id="pag">
        <style>
            #pag {
                text-align: center;
            }
        </style>
        {{ $users->links() }}
    </div> --}}

@stop
