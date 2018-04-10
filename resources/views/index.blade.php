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

        <div class="row">
            {{--Imports form--}}
            <div class="col-sm-6">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <p>Import xls/xlsx file to DB:</p>
                    <input type="file" name="file" id="import">
                    <br><br>
                    <input type="submit" class="btn btn-success" value="Import">
                </form>
            </div>
            <div class="col-sm-6">
                <p>Export xls/xlsx file from DB:</p>
                <a href="{{ route('export') }}" class="btn btn-warning">Export</a>
            </div>
        </div>
    </div>
@endsection
