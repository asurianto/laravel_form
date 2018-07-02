@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-10">
                            Detail Profile
                        </div>
                        <div class="col-2">
                            <a class="float-right"  href="{{ route('edit-profile',['id'=>$data->id]) }}">Edit Profile</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
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
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                        <div class="col-md-6">
                            <label class="col-form-label">
                                {{ $data->email }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">Alamat</label>
                        <div class="col-md-6">
                            <label class="col-form-label">
                                {{ $data->address }}
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
                        <label for="phone" class="col-md-4 col-form-label text-md-right">Telepon Rumah / HP</label>
                        <div class="col-md-6">
                            <label class="col-form-label">
                                {{ $data->phone_home }} / {{ $data->phone }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="campus" class="col-md-4 col-form-label text-md-right">Campus</label>
                        <div class="col-md-6">
                            <label class="col-form-label">
                                {{ $data->campus }}
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
                    
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <form action="{{ route('home')}}">
                                <button type="submit" class="btn btn-primary">
                                back
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
