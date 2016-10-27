@extends('layouts.app')


@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <h1>{{Auth::user()->name}}'s Profile</h1>

        @foreach($posts as $post)
            @if(Auth::user()->name == $post->user->name)
                <div class="panel panel-default">
                    <div class="panel-body">

                        <span class="col-md-1 col-md-1 glyphicon glyphicon-chevron-up">
                <!-- TODO// if feed is upvoted or downvoted, add class 'faded'  -->
            </span>
                        <div class="col-md-11"><a href="{{url($post->link)}}">{{$post->title}}</a>
                        </div>
                        <span class="col-md-1 col-md-1 glyphicon glyphicon-chevron-down">
                <!-- TODO// if feed is upvoted or downvoted, add class 'faded'  -->
            </span>
                        <div class="author pull-right">
                            {{$post->name}}
                            <strong><a href="">{{$post->user->name}}</a> - {{$post->created_at}}</strong>
                        </div>
                    </div>
                </div>
            @endif

        @endforeach


    </div>
@endsection