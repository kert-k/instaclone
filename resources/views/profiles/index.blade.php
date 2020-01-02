@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-3 p-5">
            <img height="150" src="{{$user->profile->image()}}" class="rounded-circle w-100">
        </div>

        <div class="col-6">
            <div class="d-flex pt-5 pb-3 justify-content-between ">
                <div class="pr-3 d-flex align-items-center">
                    <div class="h4">{{ $user->username }}</div>
                    <follow-button user-id="{{ $user->id }}"/>
                </div>
                
                @can('update', $user->profile)
                    <div><a href="/post/create" class="">Create post</a></div>
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
