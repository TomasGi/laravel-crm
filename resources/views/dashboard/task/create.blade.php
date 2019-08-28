@extends('dashboard.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new task</div>

                    <div class="card-body">
                        <form method="POST" action="/task/create/">
                            @csrf

                            <div class="form-group row">
                                <label for="device" class="col-md-4 col-form-label text-md-right">Device</label>

                                <div class="col-md-6">
                                    <input id="device" type="text"
                                           class="form-control @error('device') is-invalid @enderror" name="device"
                                           value="{{ old('device') }}" required autocomplete="device" autofocus>

                                    @error('device')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
  
                            <div class="form-group row">
                                <label for="description"
                                       class="col-md-4 col-form-label text-md-right">Description</label>
                                <div class="col-md-6">
                                    <textarea rows="5" id="description" type="description"class="form-control @error('description') is-invalid @enderror" 
                                    name="description" value="{{ old('description') }}" required autocomplete="description"></textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>      

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
