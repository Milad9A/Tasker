@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.2/css/bulma.min.css">

@endsection

@section('content')

    <h1>Edit Comment</h1>

    <div>

        <form method="POST" action="/admin/comments/{{$comment->id}}" style="margin-top: 10px">
            @csrf
            @method('PUT')

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
                        value="{{ $comment->body }}"
                    >

                    @error('body')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="field is-grouped" style="margin-top: 10px">
                <div class="control">
                    <button class="button is-link" type="submit">Update</button>
                </div>
            </div>
        </form>

        <div style="margin-top: 10px">
            <div class="field is-grouped">
                <a href="{{ route('admin.comments.destroy', ['comment' => $comment]) }}">
                    <div class="control">
                        <button class="button btn-danger" type="submit">Delete Comment</button>
                    </div>
                </a>
            </div>
        </div>

    </div>



@stop
