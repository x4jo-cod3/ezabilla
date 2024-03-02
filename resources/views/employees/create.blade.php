@extends('layouts.app')
@section('content')


<div class="container p-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Add Employees</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('employee.store') }}">
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
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="salary">Salary</label>
                            <input type="number" name="salary" class="form-control" id="salary" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="type">Type</label>
                            <select name="type" class="form-control" id="type" required>
                                <option value="">Please choose The Type</option>
                                <option>ممرضه</option>
                                <option>رسيبشن</option>
                                <option>دعايه</option>
                                <option>نظافه</option>
                                <option>مبيعات</option>
                                <option>إدارى</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="detials">Details</label>
                            <textarea name="detials" class="form-control" id="detials" rows="3"></textarea>
                        </div>


                        
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection


