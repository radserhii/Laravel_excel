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

        <br><br>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Patronymic</th>
                <th scope="col">Year of birth</th>
                <th scope="col">Position</th>
                <th scope="col">Salary</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($document as $value)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$value->first_name}}</td>
                    <td>{{$value->last_name}}</td>
                    <td>{{$value->patronymic}}</td>
                    <td>{{$value->birth_year}}</td>
                    <td>{{$value->position}}</td>
                    <td>{{$value->salary}}</td>
                    <td>
                        <a href="{{route('edit', ['id' => $value->id])}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="{{route('destroy', ['id' => $value->id])}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>
@endsection
