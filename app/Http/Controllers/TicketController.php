<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        if (auth()->user()->hasRole('doctor')) {

            $tickets = Ticket::where('doctors', auth()->user()->doctors_id)->get();

            return view('tickets.index', compact('tickets'));

            
        } else {

        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));


        }
        
        
    }

    public function dashboard2()


    {

        if (auth()->user()->hasRole('doctor')) {

            $tickets = Ticket::where('doctors', auth()->user()->doctors_id)->get();

            return view('tickets.index', compact('tickets'));

            
        } else {

            $tickets = Ticket::whereDate('appointment_datetime', Carbon::today())
            ->where(function ($query) {
                $query->where('ticket_status', 'Open')
                      ->orWhere('ticket_status', 'Process');
            })
            ->get();
            return view('tickets.dash2', compact('tickets'));


        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
        // Validate the form data
        $validatedData = $request->validate([
            'ticket_type'          => 'nullable|string',
            'call_status'          => 'nullable|string',
            'ticket_status'        => 'nullable|string',
            'offers'               => 'nullable|string',
            'puls'                 => 'nullable|string',
            'grafts'               => 'nullable|string',
            'fees'                 => 'nullable|string',
            'paid_method'          => 'nullable|string',
            'comment'              => 'nullable|string',
            'details'              => 'nullable|string',
            // Add validation rules for other ticket fields as needed
        ]);

        $validatedData['updated_by'] = Auth::user()->username;
        // Update the ticket with the validated data
        $ticket->update($validatedData);

        // You can also add a success message or redirect back to the ticket list page
        return redirect()->route('client.index')->with('success', 'Ticket updated successfully.');
        

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
