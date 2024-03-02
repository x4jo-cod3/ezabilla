@extends('layouts.app')
@section('content')

<div class="container">
        <h1>Stocks</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('stock.create') }}" class="btn btn-primary mb-4">Add Stock</a>


        <table class="table" id="example2">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>price</th>
                    <th>Created at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stocks as $stock)
                    <tr>
                        <td>{{ $stock->id }}</td>
                        <td>{{ $stock->item_name }}</td>
                        <td>{{ $stock->quantity }}</td>
                        <td>{{ $stock->price }}</td>
                        <td>{{ $stock->created_at }}</td>
                        <td>
                        <form method="POST" action="{{ route('stock.increase', ['id' => $stock->id]) }}">
                                @csrf
                                <div class="form-group">
                                    <input type="number" name="quantity"  value="1" min="1">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-plus"></i> Increase
                                    </button>
                                </div>
                            </form>
                            <form method="POST" action="{{ route('stock.decrease', ['id' => $stock->id]) }}">
                                @csrf
                                <div class="form-group">
                                    <input type="number" name="quantity" value="1" min="1">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-minus"></i> Decrease
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>


<script>

$(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

</script>

@endsection


