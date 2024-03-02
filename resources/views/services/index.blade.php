@extends('layouts.app')
@section('content')

<div class="container">
        <h1>Services</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('service.create') }}" class="btn btn-primary mb-4">Add Services</a>


        <div style="overflow-x: auto;">

            <table id="example2" class="display" style="width:100%">            
            <thead>
                <tr>
                    <th>code</th>
                    <th>Name</th>
                    <th>Catgory</th>
                    <th>Fees</th>
                    <th>Details</th>
                    <th>Created at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->id}}</td>
                        <td>{{ $service->name}}</td>
                        <td>{{ $service->clinic->name}}</td>
                        <td>{{ $service->fees}}</td>
                        <td>{{ $service->details}}</td>
                        <td>{{ $service->created_at}}</td>
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


