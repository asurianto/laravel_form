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
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="name" class="col-md-4 col-form-label text-md-center">Nama</label>
                            @if(Auth::user()->hasAnyRole(['user']))
                            <label for="name" class="col-md-4 col-form-label text-md-center">Status</label>
                            @endif
                        </div>
                    </div>
                    @isset ($data)
                        @foreach($data as $record)
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="name" class="col-md-4 col-form-label text-md-center">{{$record->name}}</label>                        
                                @if(Auth::user()->hasAnyRole(['user']))
                                <label for="name" class="col-md-4 col-form-label text-md-center">
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
                                    <label for="name" class="col-form-label"><a href="{{ route('update-form',['id'=>$record->id,'status'=>1 ]) }}">Accept</a></label>
                                    <label for="name" class="col-form-label text-center">|</label>
                                    <label for="name" class="col-form-label text-md-right"><a href="{{ route('update-form',['id'=>$record->id,'status'=>2 ]) }}">Reject</a></label>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
