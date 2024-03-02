@extends('layouts.app')
@section('content')

<div class="container p-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Add Clinics</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('clinic.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection


