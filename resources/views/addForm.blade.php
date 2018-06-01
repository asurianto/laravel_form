@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add Form Peminjaman</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('save-form') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="nip" class="col-md-4 col-form-label text-md-right">NIP</label>

                            <div class="col-md-6">
                                <input id="nip" type="number" class="form-control{{ $errors->has('nip') ? ' is-invalid' : '' }}" name="nip" value="{{ old('nip') }}" required autofocus>

                                @if ($errors->has('nip'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rekening" class="col-md-4 col-form-label text-md-right">Area</label>
                            <div class="col-md-6">
                                <textarea id="area" class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}" name="area" value="{{ old('area') }}" required autofocus></textarea>
                                @if ($errors->has('area'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rekening" class="col-md-4 col-form-label text-md-right">Rekening</label>
                            <div class="col-md-6">
                                <input id="rekening" type="text" class="form-control{{ $errors->has('rekening') ? ' is-invalid' : '' }}" name="rekening" value="{{ old('rekening') }}" required autofocus>
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
                                <input id="bank" type="text" class="form-control{{ $errors->has('bank') ? ' is-invalid' : '' }}" name="bank" value="{{ old('bank') }}" required autofocus>

                                @if ($errors->has('bank'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('bank') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dana" class="col-md-4 col-form-label text-md-right">Dana</label>
                            <div class="col-md-6">
                                <input id="dana" type="number" class="form-control{{ $errors->has('dana') ? ' is-invalid' : '' }}" name="dana" value="{{ old('dana') }}" required autofocus>
                                @if ($errors->has('dana'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dana') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="terbilang" class="col-md-4 col-form-label text-md-right">Terbilang</label>
                            <div class="col-md-6">
                                <textarea id="terbilang" class="form-control{{ $errors->has('terbilang') ? ' is-invalid' : '' }}" name="terbilang" value="{{ old('terbilang') }}" required autofocus></textarea>
                                @if ($errors->has('terbilang'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('terbilang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="keperluan" class="col-md-4 col-form-label text-md-right">Keperluan</label>
                            <div class="col-md-6">
                                <textarea id="keperluan" class="form-control{{ $errors->has('keperluan') ? ' is-invalid' : '' }}" name="keperluan" value="{{ old('keperluan') }}" required autofocus></textarea>
                                @if ($errors->has('keperluan'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('keperluan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cicilan" class="col-md-4 col-form-label text-md-right">Cicilan</label>
                            <div class="col-md-6">
                                <input id="cicilan" type="number" class="form-control{{ $errors->has('cicilan') ? ' is-invalid' : '' }}" name="cicilan" value="{{ old('cicilan') }}" required autofocus>
                                @if ($errors->has('cicilan'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cicilan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="tanggal_dana" class="col-md-4 col-form-label text-md-right">Tanggal Dana</label>
                            <div class="col-md-6">
                                <input id="tanggal_dana" type="date" class="form-control{{ $errors->has('tanggal_dana') ? ' is-invalid' : '' }}" name="tanggal_dana" value="{{ old('tanggal_dana') }}" required autofocus>
                                @if ($errors->has('tanggal_dana'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tanggal_dana') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
