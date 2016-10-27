@extends('layouts.app')

@section('content')

    <div class="container col-sm-8 col-sm-offset-2">
        <div class="row">
            <h1>Share your Link!</h1>
            <hr>
            <form action="{{route('post.sharelink')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="example-text-input" class="col-xs-2 col-form-label">Title</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" placeholder="Enter your title here!" id="example-text-input" name="title">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-xs-2 col-form-label">Link</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="search" placeholder="Enter your link here!" id="example-search-input" name="link">
                    </div>
                </div>
                <button type="submit" class="btn btn-danger">
                    Share this Link!
                </button>
            </form>
        </div>
    </div>
@endsection