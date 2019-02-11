{{--/**
 * Created by PhpStorm.
 * User: chinm
 * Date: 10-02-2019
 * Time: 17:36
 */--}}

@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Post <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nav item again</a>
                    </li>
                </ul>
            </nav>

            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                <h1>{{ $post->title }}</h1>
                <div class="col-sm-8 blog-main">
                    <p>{{ $post->description }}</p>
                </div>
                @if($comments)
                    @foreach($comments as $comment)
                        <div>
                            {{ $comment->description }}
                        </div>
                    @endforeach
                @endif
                {{--code for comments section under post--}}
                @guest
                    <div>Sign in to comment</div>
                @else
                    <form method="post" action="{{ route('comment', ['id' => 1]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="desc_comment">Comment for above post</label>
                            <textarea class="form-control" id="id_desc_comment" rows="3" name="desc_comment" placeholder="Write comment here"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add comment</button>
                    </form>
                @endguest
                @if(Session::has('success'))
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                            <div id="message" class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    </div>
                @endif
            </main>
        </div>
    </div>
@endsection