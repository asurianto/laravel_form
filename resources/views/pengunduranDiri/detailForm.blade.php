@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <label class="col-form-label">
                                {{ $data->name }}
                            </label>
                        </div>
                    </div>
         
                    <div class="form-group row">
                        <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>

                        <div class="col-md-6">
                            <label class="col-form-label">
                                {{ $data->alamat }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alasan" class="col-md-4 col-form-label text-md-right">Alasan</label>
                        <div class="col-md-6">
                            <label class="col-form-label">
                                {{ $data->alasan }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <a href="{{ route('home')}}">back</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
