@php
$doctors = App\Models\Doctors::all();
@endphp


@extends('layouts.app')
@section('content')

<div class="container p-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Add Users</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-md-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="name">Username</label>
                            <input type="text" name="username" class="form-control" id="username" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group col-md-3">
                        <label for="roles">{{ __('Roles') }}</label>
                            <select id="roles" name="roles[]" class="form-control" multiple>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-3"> 
                            <label for="doctors">Doctors</label>
                            <select name="doctors_id" class="form-control" id="doctors">
                                <option value="">Please choose The Doctors</option>
                                @foreach($doctors as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="javascript:history.back()" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>

@endsection


