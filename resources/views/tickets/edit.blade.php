@extends('layouts.app')
@section('content')

<form method="POST" action="{{ route('tickets.update', ['ticket' => $ticket->id]) }}">
    @csrf
    @method('PATCH')
    
<div class="container p-4">
  
   <!-- Card for "Next Ticket" -->
   <div class="card mb-3" id="process_ticket_fields">
        <div class="card-header">
            Process Ticket Fields
        </div>
        <div class="card-body">
            <!-- Fields for "Next Ticket" in one row -->
            <div class="row">

            

                <div class="form-group col-md-6">
                    <label for="ticket_status">Ticket Status</label>
                    <select name="ticket_status" class="form-control" id="ticket_status" required>
                        <option value="">Please choose The Ticket status</option>
                        <option value="Open" {{ $ticket->ticket_status === 'Open' ? 'selected' : '' }}>Open</option>
                        <option value="Process" {{ $ticket->ticket_status === 'Process' ? 'selected' : '' }}>Process</option>
                        <option value="Closed" {{ $ticket->ticket_status === 'Closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>


                <div class="form-group col-md-6">
                    <label for="paid_status">Paid Status</label>
                    <select name="paid_status" class="form-control" id="paid_status" required>
                        <option value="">Please choose The paid status</option>
                        <option value="Full" {{ $ticket->paid_status === 'Full' ? 'selected' : '' }}>Full</option>
                        <option value="Remain" {{ $ticket->paid_status === 'Remain' ? 'selected' : '' }}>Remain</option>
                    </select>
                </div>
            

                <div class="form-group col-md-3">
                        <label for="fess">Fees</label>
                        <input type="number" value="{{ $ticket->fees }}" id="fees" name="fees" class="form-control">
                </div>

                <div class="form-group col-md-3">
                    <label for="puls">Number of Puls</label>
                    <input type="number" value="{{ $ticket->puls }}" id="puls" name="puls" class="form-control">
                </div>

                <div class="form-group col-md-3">
                    <label for="puls">Number of Grafts</label>
                    <input type="number" id="grafts" value="{{ $ticket->grafts }}" name="grafts" class="form-control">
                </div>

                <div class="form-group col-md-3">
                            <label for="paid_method">Paid Method</label>
                            <select name="paid_method" class="form-control" id="paid_method">
                                <option value="">Please choose The paid Method</option>
                                <option value="Cash" {{ $ticket->paid_method === 'Cash' ? 'selected' : '' }}>Cash</option>
                                <option value="Visa" {{ $ticket->paid_method === 'Visa' ? 'selected' : '' }}>Visa</option>
                                <option value="Instapay" {{ $ticket->paid_method === 'Instapay' ? 'selected' : '' }}>Instapay</option>
                                <option value="Vodafone Cash" {{ $ticket->paid_method === 'Vodafone Cash' ? 'selected' : '' }}>Vodafone Cash</option>
                            </select>
                </div>


                <div class="form-group col-md-6">
                            <label for="comment">Comment</label>
                            <textarea name="comment" class="form-control"  id="comment" rows="3">{{ $ticket->comment }}</textarea>
                </div>

                <div class="form-group col-md-6">
                    <label for="details">Details</label>
                    <textarea name="details" class="form-control" id="details" rows="3">{{ $ticket->details }}</textarea>
                </div>
                <!-- Add more fields specific to next ticket here -->
            </div>
        </div>
    </div>

</div>
 

    <button type="submit" class="btn btn-primary">Submit</button>
</form>










@endsection


