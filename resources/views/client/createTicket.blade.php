@php
$services = App\Models\Services::all();
$clinics = App\Models\Clinics::all();
$doctors = App\Models\Doctors::all();
@endphp

@extends('layouts.app')
@section('content')

<form method="POST" action="{{ route('client.submitTicket') }}">
    @csrf
    <input type="hidden" name="client_id" value="{{ $client->id }}">
    
    <div class="row">

    <div class="form-group col-md-4 mt-2">
     <label for="ticket_type">Lead Type</label>
        <select id="ticket_type" name="ticket_type" class="form-control" required>
            <option value="">Please choose the Ticket Type</option> 
            <option value="New_lead">New Lead</option>
            <option value="process_ticket">Process Ticket</option>
        </select>
    </div>



    <div class="form-group col-md-4">
        <label for="feedback">Feedback</label>
        <textarea name="feedback" class="form-control" id="feedback" rows="3"></textarea>
    </div>



</div>


    <!-- Card for "Set New_lead" -->
    <div class="card mb-3" id="New_lead_fields" style="display: none;">
        <div class="card-header">
            Set New Lead Fields
        </div>
        <div class="card-body">


        <div class="form-group col-md-4 mt-2">
        <label for="call_status">Call Status</label>
        <select name="call_status" class="form-control" id="call_status" >
            <option value="">Please choose The Call Status</option>
            <option>No answer calls</option>
            <option>No answer whats app</option>
            <option>Reservations</option>
            <option>Paid</option>
            <option>High price</option>
            <option>call back travel</option>
            <option>call back no time</option>
            <option>Thinking</option>
            <option>Far away</option>
            <option>other</option>
        </select>
        </div>
        
            
            
            <!-- Add more fields specific to New_lead here -->
        </div>
    </div>

    <!-- Card for "Next Ticket" -->
    <div class="card mb-3" id="process_ticket_fields" style="display: none;">
        <div class="card-header">
            Process Ticket Fields
        </div>
        <div class="card-body">
            <!-- Fields for "Next Ticket" in one row -->
            <div class="row">

            <div class="form-group col-md-3"> 

            <label>Set Appointment Date and time:</label>
            <div class="input-group date" id="appointment_datetime" data-target-input="nearest" >
                <input type="text" name="appointment_datetime" id="totime" class="form-control datetimepicker-input" data-target="#appointment_datetime" /> 
                <div class="input-group-append" data-target="#appointment_datetime" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>

            </div> 

                <div class="form-group col-md-3">
                            <label for="clinics">Clinics</label>
                            <select name="clinics" class="form-control" id="clinics" >
                                <option value="">Please choose The Clinics</option>
                                @foreach($clinics as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select> 
                </div>

                <div class="form-group col-md-3">
                            <label for="doctors">Doctors</label>
                            <select name="doctors" class="form-control" id="doctors" >
                                <option value="">Please choose The Clinics</option>
                                @foreach($doctors as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                </div>



                <div class="form-group col-md-3">
                    <label for="services">Services</label>
                    <select name="services[]" class="form-control" id="services" multiple >
                        <option value="">Please choose The Clinics</option>
                        @foreach($services as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-md-3">
                            <label for="Offers">Offers</label>
                            <select name="offers" class="form-control" id="Offers">
                                <option value="">Please choose The Offers</option>
                                <option>العرض الأول</option>
                                <option>العرض الثاني</option>
                                <option>العرض الثالث</option>
                            </select>
                </div>


                <div class="form-group col-md-3">
                    <label for="fess">Fees</label>
                    <input type="number" id="fees" name="fees" class="form-control" >
                </div>

                <div class="form-group col-md-3">
                    <label for="puls">Number of Puls</label>
                    <input type="number" id="puls" name="puls" class="form-control">
                </div>

                <div class="form-group col-md-3">
                    <label for="puls">Number of Grafts</label>
                    <input type="number" id="grafts" name="grafts" class="form-control">
                </div>

                <div class="form-group col-md-3">
                            <label for="paid_status">Paid Status</label>
                            <select name="paid_status" class="form-control" id="paid_status" >
                                <option value="">Please choose The paid status</option>
                                <option>Full</option>
                                <option>Remain</option>
                            </select>
                </div>

                <div class="form-group col-md-3">
                            <label for="paid_method">Paid Method</label>
                            <select name="paid_method" class="form-control" id="paid_method" >
                                <option value="">Please choose The paid Method</option>
                                <option>Cash</option>
                                <option>Visa</option>
                                <option>Instapay</option>
                                <option>Vodafone Cash</option>
                            </select>
                </div>


                <div class="form-group col-md-4">
                            <label for="comment">Comment</label>
                            <textarea name="comment" class="form-control" id="comment" rows="3"></textarea>
                </div>
                <div class="form-group col-md-4">
                            <label for="details">Details</label>
                            <textarea name="details" class="form-control" id="details" rows="3"></textarea>
                </div>
                <!-- Add more fields specific to next ticket here -->
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script>

$(document).ready(function() {
    $('#ticket_type').change(function() {
        var selectedType = $(this).val();
        
        if (selectedType === 'New_lead') {
            $('#New_lead_fields').show();
            $('#process_ticket_fields').hide();
        } else if (selectedType === 'process_ticket') {
            $('#New_lead_fields').hide();
            $('#process_ticket_fields').show();
        } else {
            $('#New_lead_fields').hide();
            $('#process_ticket_fields').hide();
        }
    });
});



$(document).ready(function() {
    $('#ticket_type').change(function() {
        var selectedType = $(this).val();
        
        if (selectedType === 'New_lead') {
            document.getElementById("call_status").setAttribute("required", "required");

        } else {
            document.getElementById("totime").setAttribute("required", "required");
            document.getElementById("clinics").setAttribute("required", "required");
            document.getElementById("doctors").setAttribute("required", "required");
            document.getElementById("services").setAttribute("required", "required");
            document.getElementById("fees").setAttribute("required", "required");
            document.getElementById("paid_status").setAttribute("required", "required");
            document.getElementById("paid_method").setAttribute("required", "required");

        } 
    });
});



</script>


<script>
$(document).ready(function() {
    $('#appointment_datetime').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        icons: {
            time: 'far fa-clock'
        }
    });
});
</script>






@endsection


