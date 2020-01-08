@extends('layouts.app')

@section('content')
<div class="container ">
    
    @foreach ($posts as $post)

    <div class="row justify-content-center">
      <div class="col-6">

        <div class="card mb-5">
          
          {{-- card header --}}
          <header class="d-flex align-items-center">
            <div>
              <img src="{{ $post->user->profile->image() }}" class="w-100 rounded-circle m-2" style="max-width: 40px;">
            </div>
            <div class="pl-2">
              <div class="font-weight-bold">
                <a class="text-dark" href="/profile/{{ $post->user->id }}">
                  <span class="font-weight-bold">{{ $post->user->username }}</span>
                </a>
              </div>
            </div>
          </header>
          
          {{-- card image --}}
          <img src="/storage/{{ $post->image }}" class="card-img-top">
          
          {{-- card body --}}
          <div class="card-body">
            <p class="card-text">
              <a class="text-dark" href="/profile/{{ $post->user->id }}"><span class="font-weight-bold">{{ $post->user->username }}</span></a> 
              {{ $post->caption }}
            </p>
            @php
            @endphp
            <p class="card-text"><small class="text-muted">{{ Carbon\Carbon::parse($post->created_at->addHours(2))->diffForHumans() }}</small></p>
          </div>
        </div>
      
      </div>
    </div>
        
    @endforeach

    {{-- pagination --}}
    <div class="row justify-content-center">
      <div class="col-6 d-flex justify-content-center">
        {{ $posts->links() }}
      </div>
    </div>

</div>
@endsection