@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-10">
                            Banner
                        </div>
                        @if(Auth::user()->hasAnyRole(['admin']))
                        <div class="col-2">
                            <a class="float-right"  href="{{ route('admin-add-banner') }}">Add Banner</a>
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
                            <label for="name" class="col-md-4 col-form-label text-md-center">Banner</label>
                            @endif
                        </div>
                    </div>
                    @foreach($data as $record)
                    <div class="form-group row">
                        <div class="col-md-12">
                            @if(Auth::user()->hasAnyRole(['admin']))
                            <label for="name" class="col-md-4 col-form-label text-md-center">    
                                <img src="{{asset('image/'.$record->name)}}" alt="Smiley face" style="width:100%!important;display:inline-block !important;">
                            </label>
                            <label for="name" class="col-form-label"><a href="{{ route('admin-edit-banner',['id'=>$record->id]) }}">Edit</a></label>
                            <label for="name" class="col-form-label text-center">|</label>
                            <label for="name" class="col-form-label text-md-right"><a href="{{ route('admin-delete-banner',['id'=>$record->id]) }}">Delete</a></label>
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
