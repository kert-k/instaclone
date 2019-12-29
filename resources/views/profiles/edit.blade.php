@extends('layouts.app')

@section('content')
<div class="container ">
  <form method="POST" action="/profile/{{$user->id}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row d-flex justify-content-center">

      <div class="col-sm-6">

        <div class="row">
          <h2>Update profile</h2>
        </div>
          
          <div class="row">
            <label for="title" class="col-md-4 col-form-label">Title</label>
  
            <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" title="title" value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus>
  
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
  
          <div class="row">
            <label for="description" class="col-md-4 col-form-label">Description</label>
  
            <input id="description" name="description" type="text" class="form-control @error('description') is-invalid @enderror" description="description" value="{{ old('description') ?? $user->profile->description }}">
  
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
  
          <div class="row">
            <label for="url" class="col-md-4 col-form-label">URL</label>
  
            <input id="url" name="url" type="text" class="form-control @error('url') is-invalid @enderror" value="{{ old('url') ?? $user->profile->url }}">
  
            @error('url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="row">
            <label for="image" class="col-md-4 col-form-label">Profile Image</label>

            <input id="image" name="image" type="file" class="form-control-file @error('image') is-invalid @enderror" image="image" value="{{ old('image') }}" autocomplete="image" autofocus>

            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
  
  
          <div class="row pt-4">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>

        </div>


      </div>
        
    </form>

</div>
@endsection
