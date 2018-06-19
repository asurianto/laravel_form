@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Forms</div>

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
                            <label for="name" class="col-md-3 col-form-label text-md-center">Nama</label>
                            @if(Auth::user()->hasAnyRole(['admin']))
                            <label for="name" class="col-md-3 col-form-label text-md-center">NIP</label>
                            <label for="name" class="col-md-3 col-form-label text-md-center">Peminjam</label>
                            @endif
                            @if(Auth::user()->hasAnyRole(['user']))
                            <label for="name" class="col-md-3 col-form-label text-md-center">Status</label>
                            @endif
                        </div>
                    </div>
                        @foreach($data->dana as $record)
                        <div class="form-group row">
                            <div class="col-md-12">
                                @if(Auth::user()->hasAnyRole(['user']))
                                <label for="name" class="col-md-3 col-form-label text-md-center">{{$record->name}}</label>                        
                                <label for="name" class="col-md-3 col-form-label text-md-center">
                                    @if($record->status == 1)
                                        Accepted
                                    @elseif($record->status == 2)
                                        Rejected
                                    @else
                                        Pending
                                    @endif
                                </label>
                                @endif
                                @if(Auth::user()->hasAnyRole(['admin']))                            
                                    <label for="name" class="col-md-3 col-form-label text-md-center"><a href="{{ route('detail-form',['id'=>$record->id]) }}">{{$record->name}}</a></label>                        
                                    <label for="name" class="col-md-3 col-form-label text-md-center">{{$record->nip}}</label>                        
                                    <label for="name" class="col-md-3 col-form-label text-md-center">{{$record->user_name}}</label>                        
                                    <label for="name" class="col-form-label"><a href="{{ route('accept-form',['id'=>$record->id,'status'=>1 ]) }}">Accept</a></label>
                                    <label for="name" class="col-form-label text-center">|</label>
                                    <label for="name" class="col-form-label text-md-right"><a href="{{ route('update-reject-form',['id'=>$record->id,'status'=>2 ]) }}">Reject</a></label>
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
                            <label for="name" class="col-md-3 col-form-label text-md-center">Nama</label>
                            @if(Auth::user()->hasAnyRole(['admin']))
                            <label for="name" class="col-md-3 col-form-label text-md-center">NIP</label>
                            <label for="name" class="col-md-3 col-form-label text-md-center">Peminjam</label>
                            @endif
                        </div>
                    </div>
                        @foreach($data->pengunduran_diri as $record)
                        <div class="form-group row">
                            <div class="col-md-12">
                                @if(Auth::user()->hasAnyRole(['user']))
                                <label for="name" class="col-md-3 col-form-label text-md-center">{{$record->name}}</label>                        
                                @endif
                                @if(Auth::user()->hasAnyRole(['admin']))                            
                                <label for="name" class="col-md-3 col-form-label text-md-center"><a href="{{ route('detail-pengunduran-diri-form',['id'=>$record->id]) }}">{{$record->name}}</a></label>                        
                                <label for="name" class="col-md-3 col-form-label text-md-center">{{$record->nip}}</label>                        
                                <label for="name" class="col-md-3 col-form-label text-md-center">{{$record->user_name}}</label>    
                                @endif
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
