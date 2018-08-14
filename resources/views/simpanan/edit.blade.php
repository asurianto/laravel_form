@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Simpanan</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('invalid'))
                        <div class="alert alert-danger">
                            {{session('invalid')}}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('update-simpanan',['id'=>$data->id]) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="user" class="col-md-4 col-form-label text-md-right">User NIP</label>
                            <div class="col-md-6">
                               <label class="col-form-label">
                                    {{$data->nip}}
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dana" class="col-md-4 col-form-label text-md-right">Simpanan</label>

                            <div class="col-md-6">
                                <input id="dana" type="number" class="form-control{{ $errors->has('dana') ? ' is-invalid' : '' }}" name="dana" value="{{ $data->dana }}" required autofocus>

                                @if ($errors->has('dana'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dana') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
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
