@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List History Forms</div>

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
                    
                    @if (count($data->dana) > 0)
                    <!-- Form peminjaman -->
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="name" class="col-form-label text-md-center">Form Peminjaman Dana</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="name" class="col-md-2 col-form-label text-md-center">Nama</label>
                            <label for="name" class="col-md-2 col-form-label text-md-center">NIP</label>
                            <label for="name" class="col-md-2 col-form-label text-md-center">Peminjam</label>
                            <label for="name" class="col-md-2 col-form-label text-md-center">Total Dana</label>
                            <label for="name" class="col-md-2 col-form-label text-md-center">Status</label>
                        </div>
                    </div>
                        @foreach($data->dana as $record)
                        <div class="form-group row">
                            <div class="col-md-12">
                                @if(Auth::user()->hasAnyRole(['user']))
                                <label for="name" class="col-md-3 col-form-label text-md-center">{{$record->name}}</label>                        
                                
                                @endif
                                @if(Auth::user()->hasAnyRole(['admin']))                            
                                    <label for="name" class="col-md-2 col-form-label text-md-center"><a href="{{ route('detail-form',['id'=>$record->id]) }}">{{$record->name}}</a></label>                        
                                    <label for="name" class="col-md-2 col-form-label text-md-center">{{$record->nip}}</label>                        
                                    <label for="name" class="col-md-2 col-form-label text-md-center">{{$record->user_name}}</label> 
                                    <label for="name" class="col-md-2 col-form-label text-md-center">{{$record->dana}}</label>
                                    <label for="name" class="col-md-2 col-form-label text-md-center">
                                        @if($record->status == 1)
                                            Accepted
                                        @elseif($record->status == 2)
                                            Rejected
                                        @endif
                                    </label>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    @endif
                    @if (count($data->pengunduran_diri) > 0)
                    <!-- Form pengundaran diri -->
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="name" class="col-form-label text-md-center">Form Pengunduran Diri</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="name" class="col-md-2 col-form-label text-md-center">Nama</label>
                            <label for="name" class="col-md-2 col-form-label text-md-center">NIP</label>
                            <label for="name" class="col-md-2 col-form-label text-md-center">Peminjam</label>
                            <label for="name" class="col-md-2 col-form-label text-md-center">Status</label>
                        </div>
                    </div>
                        @foreach($data->pengunduran_diri as $record)
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="name" class="col-md-2 col-form-label text-md-center"><a href="{{ route('detail-pengunduran-diri-form',['id'=>$record->id]) }}">{{$record->name}}</a></label>                        
                                <label for="name" class="col-md-2 col-form-label text-md-center">{{$record->nip}}</label>                        
                                <label for="name" class="col-md-2 col-form-label text-md-center">{{$record->user_name}}</label>      
                                <label for="name" class="col-md-2 col-form-label text-md-center">
                                    @if($record->status == 1)
                                        Accepted
                                    @elseif($record->status == 2)
                                        Rejected
                                    @endif
                                </label>
                            </div>
                        </div>
                        @endforeach
                    @endif                        
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
