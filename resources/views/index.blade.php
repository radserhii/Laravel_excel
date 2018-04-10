@extends('layouts.app')

@section('content')
    <div class="container">

       {{--Errors--}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{--Session success/error--}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        {{--Imports form--}}
        <div class="col-sm-4">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label for="import">Import xls file:</label>
                <input type="file" name="file" id="import" class="form-control">
                <input type="submit" class="btn btn-primary btn-lg" value="Import">
            </form>
        </div>
    </div>
@endsection
