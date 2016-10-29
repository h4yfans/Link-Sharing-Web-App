@extends('layouts.app')

@section('content')

    @if(Session::has('success'))
        <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        </div>
    @endif


    <div class="container col-md-8 col-md-offset-2 ">
        @if(count($posts) == 0)
            <div class="col-md-8 col-md-offset-2">
                <p>There is no record(s)</p>
            </div>
        @else
            @foreach($posts as $post)
                <?php

                $vote = App\Like::where('user_id', Auth::id())->where('post_id', $post->id)->first();
                $type = null;

                // dd($vote->vote == 'up');

                if (!is_null($vote)) {
                    $type = $vote->vote;
                }

                // echo $post->id
                ?>

                <div class="panel panel-default" data-postId="{{$post->id}}">
                    <div class="panel-body">
                        <div class="col-xs-1">
                            <a href="#"><span
                                        class="lead glyphicon glyphicon-menu-up vote {{$type === 'up' ? 'active' : ''}}" id="up"></span></a>
                        </div>
                        <div class="col-xs-11">
                            <a href="{{url($post->link)}}">
                                <h3>{{$post->title}}</h3>
                            </a>
                        </div>
                        <div class="col-xs-1">
                            <a href=""><span
                                        class="lead glyphicon glyphicon-menu-down vote {{$type === 'down' ? 'active' : ''}}" id="down"></span></a>
                        </div>
                        <div class="col-xs-11">
                            <div class="votes">{{ $post->likes()->count() }} votes so far</div>
                        </div>
                        <div class="col-xs-12">
                            <div class="author pull-right">
                                <strong><a href="{{route('get.profile')}}">{{$post->user->name}}</a>
                                    - {{$post->created_at->diffForHumans()}}
                                </strong>
                            </div>
                        </div>

                    </div>
                </div>
        @endforeach
    @endif
    <!-- Large modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            Login/Registration
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                                    <li><a href="#Registration" data-toggle="tab">Registration</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="Login">
                                        <form role="form" class="form-horizontal" action="{{route('post.login')}}"
                                              method="post">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">
                                                    Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="email1"
                                                           placeholder="Email" name="email"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                                    Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="password"
                                                           placeholder="Password" name="password"/>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                </div>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        Submit
                                                    </button>
                                                    <a href="javascript:;">Forgot your password?</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="Registration">
                                        <form role="form" class="form-horizontal" method="post"
                                              action="{{route('post.signup')}}">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">
                                                    Name</label>
                                                <div class="col-sm-10">
                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" placeholder="Name"
                                                                   name="name"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">
                                                    Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="email"
                                                           placeholder="Email" name="email"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="col-sm-2 control-label">
                                                    Password Confirm</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="password"
                                                           placeholder="Password" name="password"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="col-sm-2 control-label">
                                                    Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="password"
                                                           placeholder="Password" name="password_confirm"/>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                </div>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        Save & Continue
                                                    </button>
                                                    <button type="submit" class="btn btn-default btn-sm">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection