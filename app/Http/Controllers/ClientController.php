<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Ticket;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::all(); // Assuming you have a Client model

        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name'        => 'required|string|max:255',
            'phone'       => 'required|string|max:11',
            'phone_2'     => 'nullable|string|max:11',
            'gender'      => 'nullable|string|max:255',
            'address'     => 'nullable|string|max:255',
            'source_lead' => 'nullable|string|max:255',
            'paid_status' => 'nullable|string',
            'details'     => 'nullable|string',
        ]);
    
        Client::create($validatedData);
    
        return redirect()->route('client.index')->with('success', 'Client added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
           // Retrieve the related tickets for the client
        $tickets = $client->tickets;
        return view('client.viewTicket', compact('client','tickets'));
    }

    public function addTicket($id)
    {

        $client = Client::find($id);
        return view('client.createTicket', compact('client'));

    }

    public function submitTicket(Request $request, Client $client)
    {

        // Handle null or empty services array
        $data = $request->input('ticket_type');

        if ($data == 'New_lead') 
        
        {

        // Validate the form data
        $validatedData = $request->validate([
            'client_id'            => 'required',
            'ticket_type'          => 'required|string',
            'call_status'          => 'required|string',
            'appointment_datetime' => 'nullable|string',
            'services'             => 'nullable|array', // Ensure 'services' is an array
            'clinics'              => 'nullable|string',
            'offers'               => 'nullable|string',
            'paid_method'          => 'nullable|string',
            'paid_status'          => 'nullable|string',
            'puls'                 => 'nullable|string',
            'doctors'              => 'nullable|string',
            'fees'                 => 'nullable|string',
            'grafts'               => 'nullable|string',
            'comment'              => 'nullable|string',
            'details'              => 'nullable|string',
            // Add validation rules for other ticket fields as needed
        ]);



           
        } else 
        
        {

                    // Validate the form data
        $validatedData = $request->validate([
            'client_id'            => 'required',
            'ticket_type'          => 'required|string',
            'call_status'          => 'nullable|string',
            'appointment_datetime' => 'required|string',
            'services'             => 'required|array', // Ensure 'services' is an array
            'clinics'              => 'required|string',
            'offers'               => 'nullable|string',
            'puls'                 => 'nullable|string',
            'doctors'              => 'required|string',
            'paid_method'          => 'required|string',
            'paid_status'          => 'required|string',
            'fees'                 => 'required|string',
            'grafts'               => 'nullable|string',
            'comment'              => 'nullable|string',
            'details'              => 'nullable|string',
            // Add validation rules for other ticket fields as needed
        ]);

             
        }



        $validatedData['created_by'] = Auth::user()->username;


        // Create a new Ticket model and save it to the database
        $ticket = new Ticket($validatedData);

            // Handle null or empty services array
        $services = $request->input('services');

        if (is_null($services) || empty($services)) {
            $ticket->ticket_status = 'Hold'; // Store null in the database
            $ticket->services = 31; // Store null in the database
            $ticket->clinics = 7; // Store null in the database
            $ticket->doctors = 12; // Store null in the database
            $ticket->appointment_datetime = 'Null'; // Store null in the database
            $ticket->fees = '0'; // Store null in the database
        } else {
            $uniqueServices = array_unique($request->input('services'));
            $ticket->services = implode(',', $uniqueServices);  
        }
     
        $ticket->save();

        // You can also add a success message or redirect back to the client's profile page
        return redirect()->route('client.show', $request->input('client_id'))->with('success', 'Ticket added successfully.');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
