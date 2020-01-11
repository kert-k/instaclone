@extends('layouts.app')

@section('content')
<div class="container">


  {{-- <div class="row">
    @foreach($profiles as $profile)
    @if($profile->image() == '/storage/no_image.svg.png')

    @else
      <div class="card col-sm-3 p-1 m-3">
        <img src="{{$profile->image()}}" class="card-img-top">
        <div class="card-body d-flex justify-content-between align-items-baseline">
          <h5 class="card-title">{{$profile->user->username}}</h5>
          <follow-button user-id="{{ $profile->id }}" follows="{{ Auth::user()->following->contains($profile->id) }}"/>
        </div>
      </div>
    @endif
    @endforeach

  </div> --}}

  <div class="row d-flex justify-content-center">
    <div class="col-sm-4">
      <div class="mb-1">
        <h3>Discover Profiles</h3>
      </div>
      <ul class="list-group">
        @foreach($profiles as $profile)
        <li class="list-group-item d-flex align-items-baseline justify-content-between">
          <div>
            <img src="{{$profile->image()}}" class="w-100 rounded-circle m-2" style="max-width: 40px;">
          </div>
          <div class="font-weight-bold">
            <a class="text-dark" href="/profile/{{ $profile->user->id }}">
              <span class="font-weight-bold">{{ $profile->user->username }}</span>
            </a>
          </div>
          <div>
            <follow-button user-id="{{ $profile->id }}" follows="{{ Auth::user()->following->contains($profile->id) }}"/>
          </div>
        </li>
        @endforeach
      </ul>
      <div class="d-flex justify-content-center mt-1">
        {{$profiles->links()}}
      </div>
    </div>
  </div>

</div>

@endsection