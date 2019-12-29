@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="form-group">
            <h1>Add New Post</h1>
          </div>

          <div class="form-group">
            <label for="caption" class="col-md-4 col-form-label">Caption</label>

            <div class="col-md-6">
                <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" caption="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>

                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="image" class="col-md-4 col-form-label">Image</label>

            <div class="col-md-6">
                <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" image="image" value="{{ old('image') }}" autocomplete="image" autofocus>

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        </form>
      </div>
    </div>
</div>
@endsection
