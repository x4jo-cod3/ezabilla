@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <button class="btn btn-link" data-toggle="collapse" data-target="#historyCollapse">
            Main Customer Data
        </button>
    </div>
    <div id="historyCollapse" class="collapse">

            <div class="card-body">
                <form method="POST" action="{{ route('client.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $client->name }}" class="form-control" id="name" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" value="{{ $client->phone }}" class="form-control" id="phone" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="phone_2">Phone 2</label>
                            <input type="number" name="phone_2" value="{{ $client->phone_2 }}" class="form-control" id="phone_2">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="age">Age</label>
                            <input type="number" name="age" value="{{ $client->age }}" class="form-control" id="age">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="address">Address</label>
                            <input type="text" name="address" value="{{ $client->address }}" class="form-control" id="address">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="source_lead">Source Lead</label>
                            <select name="source_lead" class="form-control" id="source_lead">
                                <option value="">Please choose The Lead</option>
                                <option value="Facebook" {{ $client->source_lead === 'Facebook' ? 'selected' : '' }}>Facebook</option>
                                <option value="WhatsApp" {{ $client->source_lead === 'WhatsApp' ? 'selected' : '' }}>WhatsApp</option>
                            </select>
                        </div>
                                
                        <div class="form-group col-md-3">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control" id="gender">
                                <option value="">Please choose The Gender</option>
                                <option value="Man" {{ $client->gender === 'Man' ? 'selected' : '' }}>Man</option>
                                <option value="Woman" {{ $client->gender === 'Woman' ? 'selected' : '' }}>Woman</option>
                            </select>
                        </div>


                        <div class="form-group col-md-4">
                            <label for="details">Details</label>
                            <textarea name="details" class="form-control" value="{{ $client->details }}" id="details" rows="3"></textarea>
                        </div>
                    </div>
                </form>
            </div>
    </div>
</div>


<div class="card">

    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">History</h5>
            <a href="{{ route('client.addTicket', ['id' => $client->id]) }}" class="btn btn-success btn-sm">
              <i class="fas fa-plus"></i>Add New Ticket
            </a>
        </div>
    </div>

    <div class="card-body">
        <!-- Add your history content here -->
        <ul class="list-group">
            @foreach ($tickets as $ticket)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            @if ($ticket->ticket_type === 'appointment')
                                <span class="badge badge-success mr-2">{{ $ticket->ticket_type }}</span>
                                Created By: {{ $ticket->created_by }} | Ticket Status: {{ $ticket->ticket_status }} | Appointment DateTime: {{ $ticket->appointment_datetime }}
                            @elseif ($ticket->ticket_type === 'process_ticket')
                                <span class="badge badge-info mr-2">{{ $ticket->ticket_type }}</span>
                                 Ticket Status: {{ $ticket->ticket_status }} | Services Type : {{ $ticket->services }} | Clinics Type : {{ $ticket->clinics }} | Doctors : {{ $ticket->doctors }} | Fees : {{ $ticket->fees }} | Doctor Comment : {{ $ticket->comment }} | Details : {{ $ticket->details }} | Paid Status:{{$ticket->paid_status}} | Created By: {{ $ticket->created_by }} 
                            @else
                                <span class="badge badge-danger mr-2">{{ $ticket->call_status }}</span>
                                  Created By: {{ $ticket->created_by }} 
                            @endif

                        </div>
                        <div class="d-flex">
                            <span class="ticket-date">
                                <small class="badge badge-warning mr-2">{{ $ticket->created_at }}</small>
                            </span>                            
                            <a href="#" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> <!-- Font Awesome edit icon -->
                            </a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>











@endsection


