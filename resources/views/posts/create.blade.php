@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form method="POST" action="/post" enctype="multipart/form-data">
          @csrf

          <div class="row">
            <h2>Add New Post</h2>
          </div>

          <div class="row">
            <label for="caption" class="col-md-4 col-form-label">Caption</label>

            <input id="caption" name="caption" type="text" class="form-control @error('caption') is-invalid @enderror" caption="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>

            @error('caption')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="row">
            <label for="image" class="col-md-4 col-form-label">Image</label>

            <input id="image" name="image" type="file" class="form-control-file @error('image') is-invalid @enderror" image="image" value="{{ old('image') }}" autocomplete="image" autofocus>

            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="row pt-4">
          <button type="submit" class="btn btn-primary">Add</button>
        </div>

        </form>
      </div>
    </div>
</div>
@endsection
