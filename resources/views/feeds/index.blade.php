@extends('layouts.app')

@section('content')

    @if(Session::has('success'))
        <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        </div>
    @endif


    <div class="container col-md-8 col-md-offset-2">

        @foreach($posts as $post)
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
                        <strong><a href="">{{$post->user->name}}</a> - {{$post->created_at->format('m/d/Y')}}</strong>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection