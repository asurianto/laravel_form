@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if($data->type_form == 'dana')
                <div class="card-header">Accept Form Dana</div>
                @else
                <div class="card-header">Accept Form Pengunduran Diri</div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($data->type_form == 'dana')
                        <form method="POST" action="{{ route('update-accept-form',['id'=>$data->id,'status'=>$data->status,'type_form'=>$data->type_form]) }}">
                        @csrf   
                        <input id="receiver" type="text" class="col-md-8 form-control" name="receiver" value="{{ $data->receiver }}" hidden>                                                     
                        <div class="form-group row">
                            <label for="total_dana" class="col-md-4 col-form-label text-md-right">Total dana</label>
                            <div class="col-md-6">
                               <label class="col-form-label">
                                    Rp.{{ number_format($data->total_dana,2,',','.') }}
                                </label>
                            </div>
                        </div>
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
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Dana yang di transfer</label>
                            <div class="col-md-6">
                                <input id="dana_transfer" type="number" class="col-md-8 form-control{{ $errors->has('dana_transfer') ? ' is-invalid' : '' }}" name="dana_transfer" value="{{ old('dana_transfer') }}" required autofocus>                                
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
                    @else
                        <form method="POST" action="{{ route('update-accept-form',['id'=>$data->id,'status'=>$data->status,'type_form'=>$data->type_form]) }}">
                            @csrf   
                            <input id="receiver" type="text" class="col-md-8 form-control" name="receiver" value="{{ $data->receiver }}" hidden>                                                     
                            <div class="form-group row">
                                <label for="name" class="col-md-12 col-form-label text-md-center">Are you sure accept {{$data->username}} to resign ?</label>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="btn btn-primary">
                                    Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
