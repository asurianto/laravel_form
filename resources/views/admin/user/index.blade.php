@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Users</div>

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
                            <label for="name" class="col-md-4 col-form-label text-md-center">Status</label>
                        </div>
                    </div>
                    @isset ($data)
                        @foreach($data as $record)
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="name" class="col-md-4 col-form-label text-md-center">{{$record->name}}</label>                        
                                <label for="name" class="col-md-4 col-form-label text-md-center">
                                    @if($record->active == 0)
                                        <label for="name" class="col-form-label"><a href="{{ route('admin-update-user-status',['id'=>$record->id,'active'=>1 ]) }}">Set Active</a></label>
                                    @elseif($record->active == 1)
                                        <label for="name" class="col-form-label"><a href="{{ route('admin-update-user-status',['id'=>$record->id,'active'=>0 ]) }}">Set Inactive</a></label>
                                    @endif
                                </label>
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
