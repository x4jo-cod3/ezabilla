@php
$clinics = App\Models\Clinics::all();
@endphp

@extends('layouts.app')
@section('content')


<div class="container p-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Add Doctors</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('doctor.store') }}">
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" class="form-control" id="phone" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="clinic_id">Clinics</label>
                            <select name="clinic_id" class="form-control" id="clinic_id" required>
                                <option value="">Please choose The Clinics</option>
                                @foreach($clinics as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="details">Details</label>
                            <textarea name="details" class="form-control" id="details" rows="3"></textarea>
                        </div>


                        
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection


