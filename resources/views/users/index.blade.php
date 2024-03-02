@php
function roleToClass($roleName) {
    $classMapping = [
        'Admin' => 'bg-danger',
        'Doctors' => 'bg-success',
        'Sales' => 'bg-info',
        'Users' => 'bg-warning',
        'Operation' => 'bg-dark',
        'Receiption' => 'bg-warning',
        'Stock Man' => 'bg-primary',
    ];

    return $classMapping[$roleName] ?? '';
}
@endphp

@extends('layouts.app')
@section('content')

<div class="container">
        <h1>Users</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('users.create') }}" class="btn btn-primary mb-4">Add Users</a>


        <div style="overflow-x: auto;">

            <table id="example2" class="display" style="width:100%">            

            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Roles</th>
                    <th>Created at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                <span class="{{ roleToClass($role->name) }}">{{ $role->name }}</span><br>
                            @endforeach
                        </td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <!-- Add Ticket Button with Icon -->
                            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-edit"></i>
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


