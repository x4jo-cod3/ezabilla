@php
$doctors = App\Models\Doctors::all();
@endphp


@extends('layouts.app')
@section('content')

<div class="container p-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Edit Users</h1>
            </div>
            <div class="card-body">
            <form action="{{ route('users.update',$user->id) }}" method="POST">
                @csrf
                @method('PUT')                    
                    <div class="form-row">

                        <div class="form-group col-md-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control" id="name" required>
                        </div>



                        <div class="form-group col-md-3">
                            <label for="roles">{{ __('Roles') }}</label>
                            <select id="roles" name="roles[]" class="form-control" multiple>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" @if($user->roles->contains($role->id)) selected @endif>{{ $role->name }}</option>
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
                        
                        <div class="form-group col-md-3"> 
                            <label for="is_active">User Status</label>
                            <select name="is_active" class="form-control" id="is_active">
                                <option value="" @if($value->is_active === null) selected @endif disabled>Please choose The Doctors</option>
                                <option value="1" @if($value->is_active === 1) selected @endif @if($value->is_active === 1) hidden @endif>Active</option>
                                <option value="0" @if($value->is_active === 0) selected @endif @if($value->is_active === 0) hidden @endif>Inactive</option>
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


