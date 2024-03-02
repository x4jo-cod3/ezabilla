@extends('layouts.app')
@section('content')

<div class="container p-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Add Client</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('client.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" class="form-control" id="phone" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="phone_2">Phone 2</label>
                            <input type="number" name="phone_2" class="form-control" id="phone_2">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="age">Age</label>
                            <input type="number" name="age" class="form-control" id="age">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address">
                        </div>
                        <div class="form-group col-md-3">
                                    <label for="source_lead">Source Lead</label>
                                    <select name="source_lead" class="form-control" id="source_lead" required>
                                        <option value="">Please choose The Lead</option>
                                        <option>Facebook</option>
                                        <option>Instagram</option>
                                        <option>What's app</option>
                                        <option>Direct Call</option>
                                        <option>Recommendations</option>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label for="gender">Gender</label>
                                    <select name="gender" class="form-control" id="gender" required>
                                        <option value="">Please choose The Gender</option>
                                        <option value="Man">Man</option>
                                        <option value="Woman">Woman</option>
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


