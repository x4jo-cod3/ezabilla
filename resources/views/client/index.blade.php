@extends('layouts.app')
@section('content')

<div class="container">
    
        <h1>Clients</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('client.create') }}" class="btn btn-primary mb-4">Add Client</a>


    <div style="overflow-x: auto;">

            <table id="example2" class="display" style="width:100%">            
            <thead>
                <tr>
                    <th>code</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Phone_2</th>
                    <th>Address</th>
                    <th>Source Lead</th>
                    <th>Gender</th>
                    <th>Details</th>
                    <th>Created at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->phone_2 }}</td>
                        <td>{{ $client->address }}</td>
                        <td>{{ $client->source_lead }}</td>
                        <td>{{ $client->gender }}</td>
                        <td>{{ $client->details }}</td>
                        <td>{{ $client->created_at }}</td>
                        <td>
                            <!-- View Button with Icon -->
                            <a href="{{ route('client.show', $client) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            
                            <!-- Add Ticket Button with Icon -->
                            <a href="{{ route('client.addTicket', ['id' => $client->id]) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-plus"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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


