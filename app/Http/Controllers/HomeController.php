<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Doctors;
use App\Models\Clinics;
use App\Models\Employee;
use App\Models\Ticket;
use App\Models\Expenses;
use Carbon\Carbon;



use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clientCount   = Client::count();
        $doctorCount   = Doctors::count();
        $clinicsCount  = Clinics::count();
        $employeeCount = Employee::count();

        $today = Carbon::today();

        $expenses = Expenses::whereDate('created_at', $today)->distinct()->sum('item_price');


        $income   = Ticket::whereDate('created_at', $today)->where('ticket_status', 'Closed')->sum('fees');
        $profit   = $income - $expenses ;

    

        $services_1 = Ticket::where('clinics', '1')->whereDate('created_at', $today)->count();
        $services_2 = Ticket::where('clinics', '2')->whereDate('created_at', $today)->count();
        $services_3 = Ticket::where('clinics', '3')->whereDate('created_at', $today)->count();
        $services_4 = Ticket::where('clinics', '4')->whereDate('created_at', $today)->count();
        $services_5 = Ticket::where('clinics', '5')->whereDate('created_at', $today)->count();
        $services_6 = Ticket::where('clinics', '6')->whereDate('created_at', $today)->count();
        

        return view('home',compact('expenses','income','profit','clientCount','doctorCount','clinicsCount','employeeCount','services_1','services_2','services_3','services_4','services_5','services_6'));
    }
}
