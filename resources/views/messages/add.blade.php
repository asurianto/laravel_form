@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Message</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('add-message') }}">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="rekening" class="col-md-4 col-form-label text-md-right">Receiver</label>
                            <div class="col-md-6">
                                <select id="receiver" class="form-control{{ $errors->has('receiver') ? ' is-invalid' : '' }}" name="receiver" required autofocus>
                                @foreach($data as $record)
                                    <option value="{{$record->id}}">{{$record->name}}</option>
                                @endforeach
                                </select>
                                @if ($errors->has('receiver'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('receiver') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rekening" class="col-md-4 col-form-label text-md-right">Message</label>
                            <div class="col-md-6">
                                <textarea id="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" value="{{ old('message') }}" required autofocus></textarea>
                                @if ($errors->has('message'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
