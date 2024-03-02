@extends('layouts.app')
@section('content')
    <h1>Create New Stock Item</h1>
    <form method="POST" action="{{ route('stock.store') }}">
        @csrf

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="name">Item Name</label>
            <input type="text" class="form-control" id="item_name" name="item_name" required>
        </div>
        <div class="form-group col-md-4">
            <label for="price">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group col-md-4">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div> 
    </div>

    <button type="submit" class="btn btn-primary">Create</button>

    </form>
@endsection
