@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-10">
                            Forums
                        </div>
                        @if(Auth::user()->hasAnyRole(['admin']))
                        <div class="col-2">
                            <a class="float-right"  href="{{ route('report-peminjaman-form') }}">Download</a>
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
                            @if(Auth::user()->hasAnyRole(['admin']))
                            <label for="name" class="col-md-2 col-form-label text-md-center">Tanggal Dana</label>
                            <label for="name" class="col-md-2 col-form-label text-md-center">NIP</label>
                            <label for="name" class="col-md-2 col-form-label text-md-center">Peminjam</label>
                            <label for="name" class="col-md-2 col-form-label text-md-center">Total Dana</label>
                            @endif
                            @if(Auth::user()->hasAnyRole(['user']))
                            <label for="name" class="col-md-2 col-form-label text-md-center">Jumlah Dana</label>
                            <label for="name" class="col-md-2 col-form-label text-md-center">Status</label>
                            @endif
                        </div>
                    </div>
                        @foreach($data->dana as $record)
                        <div class="form-group row">
                            <div class="col-md-12">
                                @if(Auth::user()->hasAnyRole(['user']))
                                <label for="name" class="col-md-2 col-form-label text-md-center">{{$record->name}}</label>
                                <label for="name" class="col-md-2 col-form-label text-md-center">Rp.{{ number_format($record->dana,2,',','.') }}</label>                        
                                <label for="name" class="col-md-2 col-form-label text-md-center">
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
                                    <label for="name" class="col-md-2 col-form-label text-md-center"><a href="{{ route('detail-form',['id'=>$record->id]) }}">{{$record->name}}</a></label>                        
                                    <label for="name" class="col-md-2 col-form-label text-md-center">{{$record->tanggal_dana}}</label>                        
                                    <label for="name" class="col-md-2 col-form-label text-md-center">{{$record->nip}}</label>                       
                                    <label for="name" class="col-md-2 col-form-label text-md-center">{{$record->user_name}}</label> 
                                    <label for="name" class="col-md-2 col-form-label text-md-center">Rp.{{ number_format($record->dana,2,',','.') }}</label>                  
                                    <label for="name" class="col-form-label"><a href="{{ route('accept-form',['id'=>$record->id,'status'=>1, 'type_form'=>'dana' ]) }}">Accept</a></label>
                                    <label for="name" class="col-form-label text-center">|</label>
                                    <label for="name" class="col-form-label text-md-right"><a href="{{ route('update-reject-form',['id'=>$record->id,'status'=>2, 'type_form'=>'dana' ]) }}">Reject</a></label>
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
                            @if(Auth::user()->hasAnyRole(['admin']))
                            <label for="name" class="col-md-2 col-form-label text-md-center">NIP</label>
                            <label for="name" class="col-md-2 col-form-label text-md-center">Peminjam</label>
                            @endif
                            @if(Auth::user()->hasAnyRole(['user']))
                            <label for="name" class="col-md-2 col-form-label text-md-center">Status</label>
                            @endif
                        </div>
                    </div>
                        @foreach($data->pengunduran_diri as $record)
                        <div class="form-group row">
                            <div class="col-md-12">
                                @if(Auth::user()->hasAnyRole(['user']))
                                <label for="name" class="col-md-2 col-form-label text-md-center">{{$record->name}}</label>                        
                                <label for="name" class="col-md-2 col-form-label text-md-center">
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
                                <label for="name" class="col-md-2 col-form-label text-md-center"><a href="{{ route('detail-pengunduran-diri-form',['id'=>$record->id]) }}">{{$record->name}}</a></label>                        
                                <label for="name" class="col-md-2 col-form-label text-md-center">{{$record->nip}}</label>                        
                                <label for="name" class="col-md-2 col-form-label text-md-center">{{$record->user_name}}</label>      
                                <label for="name" class="col-form-label"><a href="{{ route('accept-form',['id'=>$record->id,'status'=>1, 'type_form'=>'pengunduran' ]) }}">Accept</a></label>
                                <label for="name" class="col-form-label text-center">|</label>
                                <label for="name" class="col-form-label text-md-right"><a href="{{ route('update-reject-form',['id'=>$record->id,'status'=>2, 'type_form'=>'pengunduran' ]) }}">Reject</a></label>
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
