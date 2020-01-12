@extends('layouts.app')

@section('content')
<div class="container ">
  <div class="row">
    <div class="col-sm-8">
      
      @foreach ($posts as $post)

      <div class="row justify-content-end">
        <div class="">
  
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

    </div>  
    <div class="col-sm-4">
      <ul class="list-group">
        <li class="list-group-item">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Morbi leo risus</li>
        <li class="list-group-item">Porta ac consectetur ac</li>
        <li class="list-group-item">Vestibulum at eros</li>
      </ul>
    </div>
  </div> 

    

    {{-- pagination --}}
    <div class="row justify-content-center">
      <div class="col-6 d-flex justify-content-center">
        {{ $posts->links() }}
      </div>
    </div>

</div>
@endsection