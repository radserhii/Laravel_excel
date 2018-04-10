@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="offset-4 col-sm-4">
            <form action="{{route('update', ['id' => $row->id])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="first_name">First name</label>
                    <input type="text"
                           name="first_name"
                           class="form-control"
                           id="first_name"
                           value="{{$row->first_name}}">
                </div>
                <div class="form-group">
                    <label for="last_name">Last name</label>
                    <input type="text"
                           name="last_name"
                           class="form-control"
                           id="last_name"
                           value="{{$row->last_name}}">
                </div>
                <div class="form-group">
                    <label for="patronymic">Patronymic</label>
                    <input type="text"
                           name="patronymic"
                           class="form-control"
                           id="patronymic"
                           value="{{$row->patronymic}}">
                </div>
                <div class="form-group">
                    <label for="birth_year">Birth of year</label>
                    <input type="number"
                           name="birth_year"
                           class="form-control"
                           id="birth_year"
                           value="{{$row->birth_year}}">
                </div>
                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text"
                           name="position"
                           class="form-control"
                           id="position"
                           value="{{$row->position}}">
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="text"
                           name="salary"
                           class="form-control"
                           id="salary"
                           value="{{$row->salary}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection