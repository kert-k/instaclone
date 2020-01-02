@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
      <div class="col-8">
        <img src="/storage/{{ $post->image }}" class="w-100">
      </div>

      <div class="col-4">
        <div>
          <div class="d-flex align-items-center">
            <div class="div">
              <img src="{{ $post->user->profile->image() }}" class="w-100 rounded-circle" style="max-width: 40px;">
            </div>

            <div class="pl-3">
              <div class="font-weight-bold">
                <a class="text-dark" href="/profile/{{ $post->user->id }}">
                  <span class="font-weight-bold">{{ $post->user->username }}</span>
                </a>
              </div>
            </div>
          </div>

          <hr>
          
          <p><a class="text-dark" href="/profile/{{ $post->user->id }}"><span class="font-weight-bold">{{ $post->user->username }}</span></a> {{ $post->caption }}</p>
        </div>
      </div>
    </div>

</div>
@endsection
