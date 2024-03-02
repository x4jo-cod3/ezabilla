@extends('layouts.app')
@section('content')

<div class="container">
        <h1>Tickets</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

    <div style="overflow-x: auto;">

        <table id="example2" class="display" style="width:100%">

            <thead>
                <tr>
                    <th>code</th>
                    <th>Client Name</th>
                    <th>Phone</th>
                    <th>Lead Type</th>
                    <th>Call Status</th>
                    <th>Ticket Status</th>
                    <th>Appointment Datetime</th>
                    <th>Doctor Name</th>
                    <th>Fees</th>
                    <th>Paid Status</th>
                    <th>Paid Method</th>
                    <th>Created at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->client->name }}</td>
                        <td>{{ $ticket->client->phone }}</td>
                        <td>{{ $ticket->ticket_type }}</td>
                        <td>{{ $ticket->call_status }}</td>
                        <td>{{ $ticket->ticket_status }}</td>
                        <td>{{ $ticket->appointment_datetime }}</td>
                        <td>{{ $ticket->doctor->name }}</td>
                        <td>{{ $ticket->fees }}</td>
                        <td>{{ $ticket->paid_status }}</td>
                        <td>{{ $ticket->paid_method }}</td>
                        <td>{{ $ticket->created_at }}</td>
                        <td>
                            <!-- View Button with Icon -->
                            <a href="{{ route('client.show', $ticket->client_id ) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i>
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


