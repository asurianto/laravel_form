@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Accept Form</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('update-accept-form',['id'=>$data->id,'status'=>$data->status]) }}">
                        @csrf   
                        <input id="receiver" type="text" class="col-md-8 form-control" name="receiver" value="{{ $data->receiver }}" hidden>                                                     
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Tanggal Transfer</label>
                            <div class="col-md-6">
                                <input id="dateConfirm" type="date" class="col-md-8 form-control{{ $errors->has('dateConfirm') ? ' is-invalid' : '' }}" name="dateConfirm" value="{{ old('dateConfirm') }}" required autofocus>                                
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
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
