@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-10">
                                List Messages
                        </div>
                        <div class="col-2">
                            <a class="float-right"  href="{{ route('add-message') }}">+</a>
                        </div>
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
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="name" class="col-md-4 col-form-label text-md-center">Message</label>
                            @if(Auth::user()->hasAnyRole(['admin']))
                                <label for="name" class="col-md-4 col-form-label text-md-center">Receiver</label>
                            @endif
                            @if(Auth::user()->hasAnyRole(['user']))
                                <label for="name" class="col-md-4 col-form-label text-md-center">Received At</label>
                            @endif
                        </div>
                    </div>
                    @foreach($data as $record)
                    <div class="form-group row">
                        <div class="col-md-12">
                                <label for="name" class="col-md-4 col-form-label text-md-center">{{$record->message}}</label>                        
                            @if(Auth::user()->hasAnyRole(['admin']))
                                <label for="name" class="col-md-4 col-form-label text-md-center">{{$record->name}}</label>           
                                <label for="name" class="col-form-label text-md-right"><a href="{{ route('delete-message',['id'=>$record->id ]) }}">Delete</a></label>
                            @endif
                            @if(Auth::user()->hasAnyRole(['user']))
                                <label for="name" class="col-md-4 col-form-label text-md-center">{{$record->created_at}}</label>           
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
