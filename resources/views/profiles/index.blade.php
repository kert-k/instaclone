@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-3 p-5">
            <img height="150" src="https://scontent-hel2-1.cdninstagram.com/v/t51.2885-19/s320x320/74375710_3171904429701998_7240736187227308032_n.jpg?_nc_ht=scontent-hel2-1.cdninstagram.com&_nc_ohc=EgaFsNNOUpQAX_5D4oP&oh=7cb4b48f3c592b6252e6931e11a6724d&oe=5E95E64C" class="rounded-circle">
        </div>

        <div class="col-6">
            <div class="d-flex pt-5 justify-content-between">
                <div class="pr-3"><h1>{{$user->username}}</h1></div>
                <div><a href="/post/create" class="btn btn-primary">Create post</a></div>
            </div>
            <div class="d-flex pb-3">
                <div class="pr-5"><strong>100</strong> posts</div>
                <div class="pr-5"><strong>222</strong> followers</div>
                <div class="pr-5"><strong>123</strong> following</div>
            </div>

            <div><strong>{{$user->profile->title}}</strong></div>
            
            <div>{{$user->profile->description}}</div>
            
            @if ($user->profile->url)

                <div><strong><a href="{{$user->profile->url}}">{{$user->profile->url}}</a></strong></div>
            
            @endif
        </div>
    </div>

    <div class="row ">
        <div class="col-4">
            <img src="https://image.freepik.com/free-photo/image-human-brain_99433-298.jpg" class="w-100 h-100">
        </div>
        <div class="col-4">
            <img src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="w-100 h-100">
        </div>
        <div class="col-4">
            <img src="https://images.unsplash.com/photo-1500622944204-b135684e99fd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" class="w-100 h-100">
        </div>
    </div>
</div>
@endsection
