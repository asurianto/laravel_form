@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add Banner</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('invalid'))
                        <div class="alert alert-danger">
                            {{session('invalid')}}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin-insert-banner') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="user" class="col-md-4 col-form-label text-md-right">Upload Banner</label>
                            <div class="col-md-6">
                            <input type="file" id="banner" name="banner" accept="image/png, image/jpeg, image/jpg" require/>
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
