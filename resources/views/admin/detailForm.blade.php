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
                        <label for="nip" class="col-md-4 col-form-label text-md-right">NIP</label>

                        <div class="col-md-6">
                            <label class="col-form-label">
                                {{ $data->nip }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="area" class="col-md-4 col-form-label text-md-right">Area</label>
                        <div class="col-md-6">
                            <label class="col-form-label">
                                {{ $data->area }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="rekening" class="col-md-4 col-form-label text-md-right">Rekening</label>
                        <div class="col-md-6">
                            <label class="col-form-label">
                                {{ $data->rekening }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="bank" class="col-md-4 col-form-label text-md-right">Bank</label>

                        <div class="col-md-6">
                            <label class="col-form-label">
                                {{ $data->bank }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dana" class="col-md-4 col-form-label text-md-right">Dana</label>
                        <div class="col-md-6">
                            <label class="col-form-label">
                                {{ $data->dana_potongan }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="terbilang" class="col-md-4 col-form-label text-md-right">Terbilang</label>
                        <div class="col-md-6">
                            <label class="col-form-label">
                                {{ $data->terbilang }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="keperluan" class="col-md-4 col-form-label text-md-right">Keperluan</label>
                        <div class="col-md-6">
                            <label class="col-form-label">
                                {{ $data->keperluan }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cicilan" class="col-md-4 col-form-label text-md-right">Cicilan</label>
                        <div class="col-md-6">
                            <label class="col-form-label">
                                {{ $data->cicilan_potongan }}
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="tanggal_dana" class="col-md-4 col-form-label text-md-right">Tanggal Dana</label>
                        <div class="col-md-6">
                            <label class="col-form-label">
                                {{ $data->tanggal_dana }}
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
