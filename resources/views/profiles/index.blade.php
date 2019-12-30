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
                
                @can('update', $user->profile)
                    <div><a href="/post/create" class="btn btn-primary">Create post</a></div>
                @endcan

            </div>

            @can('update', $user->profile)
                <div><a href="/profile/{{ $user->id }}/edit" class="">Edit profile</a></div>
            @endcan
            
            <div class="d-flex pb-3">
                <div class="pr-5"><strong>{{ count($user->posts) }}</strong> posts</div>
                <div class="pr-5"><strong>999</strong> followers</div>
                <div class="pr-5"><strong>888</strong> following</div>
            </div>

            <div><strong>{{$user->profile->title}}</strong></div>
            
            <div>{{$user->profile->description}}</div>
            
            @if ($user->profile->url)

                <div><strong><a href="{{$user->profile->url}}">{{$user->profile->url}}</a></strong></div>
            
            @endif
        </div>
    </div>



    <div class="row ">
        @foreach ($user->posts as $post)

            <div class="col-4 pb-4">
                <a href="/post/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>

        @endforeach
    </div>
</div>
@endsection
