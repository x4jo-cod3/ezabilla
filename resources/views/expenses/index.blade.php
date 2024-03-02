@extends('layouts.app')
@section('content')

<div class="container">
        <h1>Expenses</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('expenses.create') }}" class="btn btn-primary mb-4">Add Expenses</a>


<div style="overflow-x: auto;">

    <table id="example2" class="display" style="width:100%">     
    <thead>
        <tr>
            <th>code</th>
            <th>Name</th>
            <th>Price</th>
            <th>Details</th>
            <th>Created at</th>
        </tr>
    </thead>
    <tbody>
        @php
            $totalPrice = 0; // Initialize the total price variable
        @endphp
        @foreach ($expenses as $expense)
            <tr>
                <td>{{ $expense->id }}</td>
                <td>{{ $expense->name }}</td>
                <td>{{ $expense->item_price }}</td>
                <td>{{ $expense->details }}</td>
                <td>{{ $expense->created_at }}</td>
            </tr>
            @php
                $totalPrice += $expense->item_price; // Add the expense price to the total
            @endphp
        @endforeach
    </tbody>
</table>
</div>

<!-- Display the total price after the table with Bootstrap styling -->
<div class="bg-light p-3">
    <p class="font-weight-bold">Total Price: <span class="badge badge-success">{{ $totalPrice }}</span></p>
</div>

    </div>


    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function () {
            $('#example2').DataTable({
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var title = column.header().textContent;

                        // Create input element
                        var input = document.createElement('input');
                        input.placeholder = title;
                        $(input).appendTo($(column.header()).empty())
                            .on('keyup change', function () {
                                if (column.search() !== this.value) {
                                    column.search(this.value).draw();
                                }
                            });
                    });
                }
            });
        });
    </script>

@endsection


