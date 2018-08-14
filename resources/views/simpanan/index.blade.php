@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-10">
                            Simpanan Dana
                        </div>
                        @if(Auth::user()->hasAnyRole(['admin']))
                        <div class="col-2">
                            <a class="float-right"  href="{{ route('add-simpanan') }}">Create Simpanan</a>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif

                    @if (session('invalid'))
                        <div class="alert alert-danger">
                            {{session('invalid')}}
                        </div>
                    @endif
                    <div class="form-group row">
                        <div class="col-md-12">
                            @if(Auth::user()->hasAnyRole(['admin']))
                            <label for="name" class="col-md-2 col-form-label text-md-center">Nama</label>
                            <label for="name" class="col-md-2 col-form-label text-md-center">NIP</label>
                            @endif
                            <label for="name" class="col-md-2 col-form-label text-md-center">Total Dana</label>
                        </div>
                    </div>
                    @foreach($data as $record)
                    <div class="form-group row">
                        <div class="col-md-12">
                            @if(Auth::user()->hasAnyRole(['admin']))
                            <label for="name" class="col-md-2 col-form-label text-md-center">{{$record->name}}</label>
                            <label for="name" class="col-md-2 col-form-label text-md-center">{{$record->nip}}</label>
                            <label for="name" class="col-md-2 col-form-label text-md-center">Rp.{{ number_format($record->total_simpanan,2,',','.') }}</label>
                            <label for="name" class="col-form-label"><a href="{{ route('edit-simpanan',['id'=>$record->id]) }}">Update</a></label>
                            @else
                            <label for="name" class="col-md-2 col-form-label text-md-center">Rp.{{ number_format($record->total_simpanan,2,',','.') }}</label>
                            @endif   
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
