@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Profile
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('update-profile',['id'=>$data->id]) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $data->name }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $data->email }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">Area</label>
                            <div class="col-md-6">
                                <textarea id="area" class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}" name="area" value="{{ $data->area }}" required autofocus>{{ $data->area }}</textarea>
                                @if ($errors->has('area'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="campus" class="col-md-4 col-form-label text-md-right">Kampus</label>
                            <div class="col-md-6">
                                <input id="campus" type="text" class="form-control{{ $errors->has('campus') ? ' is-invalid' : '' }}" name="campus" value="{{ $data->campus }}" required autofocus>
                                @if ($errors->has('campus'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('campus') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dop" class="col-md-4 col-form-label text-md-right">Tempat / Tanggal Lahir</label>
                            <div class="col-md-6">
                                <input id="dop" type="text" class="col-md-4 form-control{{ $errors->has('dop') ? ' is-invalid' : '' }}" name="dop" value="{{ $data->dop }}" required autofocus>
                                <input id="dob" type="date" class="col-md-8 form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ $data->dob }}" required autofocus>
                                @if ($errors->has('dop'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dop') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('dob'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Alamat</label>
                            <div class="col-md-6">
                                <textarea id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $data->address }}" required autofocus>{{$data->address}}</textarea>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="post_code" class="col-md-4 col-form-label text-md-right">Koda Post</label>                        
                            <div class="col-md-6">
                                <input id="post_code" type="number" class="form-control{{ $errors->has('post_code') ? ' is-invalid' : '' }}" name="post_code" value="{{ $data->post_code }}" required autofocus>

                                @if ($errors->has('post_code'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('post_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_home" class="col-md-4 col-form-label text-md-right">Telepon Rumah</label>
                            <div class="col-md-6">
                                <input id="phone_home" type="text" class="form-control{{ $errors->has('phone_home') ? ' is-invalid' : '' }}" name="phone_home" value="{{ $data->phone_home }}" required autofocus>
                                @if ($errors->has('phone_home'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone_home') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">No HP</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $data->phone }}" required autofocus>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rekening" class="col-md-4 col-form-label text-md-right">Rekening</label>
                            <div class="col-md-6">
                                <input id="rekening" type="text" class="form-control{{ $errors->has('rekening') ? ' is-invalid' : '' }}" name="rekening" value="{{ $data->rekening }}" required autofocus>
                                @if ($errors->has('rekening'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('rekening') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bank" class="col-md-4 col-form-label text-md-right">Bank</label>

                            <div class="col-md-6">
                                <input id="bank" type="text" class="form-control{{ $errors->has('bank') ? ' is-invalid' : '' }}" name="bank" value="{{ $data->bank }}" required autofocus>

                                @if ($errors->has('bank'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('bank') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>                                
                                <button class="btn btn-primary">
                                    <a href="{{ route('detail-profile',['id'=>$data->id])}}">back</a>
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
