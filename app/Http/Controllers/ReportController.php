<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportExport;
use DB;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('report.index');
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
        $reportType =   $request->input('report_type');
        $dateRange  = $request->input('reservation');
        $dates      = explode(' - ', $dateRange);
        $startDate  = Carbon::parse($dates[0]);
        $endDate    = Carbon::parse($dates[1]);





            // Fetch data based on report type and date range
        if ($reportType === 'leads') {

            $data = DB::table('ticket')
            ->join('client', 'ticket.client_id', '=', 'client.id')
            ->join('doctors', 'ticket.doctors', '=', 'doctors.id')    
            ->join('services', 'ticket.services', '=', 'services.id')    
            ->whereBetween('ticket.created_at', [$startDate, $endDate])
            ->select([
                'client.name as اسم البيشنت ' ,
                'client.phone as الرقم ',
                'ticket.created_at as التاريخ ',
                'ticket.updated_at as اخر اتصال ',
                'ticket.feedback as feed back',
                'client.source_lead as الميديا',
                'services.name as الخدمه',
                'ticket.details as التفاصيل',
                'client.address as المنطقه',
                'ticket.ticket_status as lead statues',
                'ticket.appointment_datetime as الميعاد',
                'doctors.name as الدكتور',
                'ticket.created_by as السيلز',
                'ticket.updated_by as تعديل بواسطه'
            ])
            ->get();

        // Define custom headings if needed
            $customHeadings = [
            'اسم البيشنت',
            'الرقم',
            'التاريخ',
            'اخر اتصال',
            'feed back',
            'الميديا',
            'الخدمه',
            'التفاصيل',
            'المنطقه',
            'lead statues',
            'الميعاد',
            'الدكتور',
            'السيلز',
            'تعديل بواسطه'
        ];


             // Use Laravel-Excel to export the data
             return Excel::download(new ReportExport($data,$customHeadings), 'Leads.xlsx');
    

        } elseif ($reportType === 'stock') {

            $data = DB::table('stock_transactions')
            ->join('stocks', 'stock_transactions.item_id', '=', 'stocks.id')    
            ->whereBetween('stock_transactions.created_at', [$startDate, $endDate])
            ->select([
                'stocks.item_name as اسم المنتج ' ,
                'stock_transactions.user_name as أمين المخزن ',
                'stock_transactions.quantity_change as الكميه ',
                'stock_transactions.created_at as التاريخ'

            ])
            ->get();

        // Define custom headings if needed
            $customHeadings = [
            'اسم المنتج',
            'أمين المخزن',
            'الكميه',
            'التاريخ'
        ];


             // Use Laravel-Excel to export the data
             return Excel::download(new ReportExport($data,$customHeadings), 'Stock.xlsx');
    



        }elseif ($reportType === 'expenses') {

            $data = DB::table('expenses')
            ->whereBetween('expenses.created_at', [$startDate, $endDate])
            ->select([
                'expenses.name as اسم الصرف ' ,
                'expenses.item_price as سعر الصرف ',
                'expenses.details as التفاصيل ',
                'expenses.created_by as مصروف بواسطه',
                'expenses.created_at as التاريخ'

            ])
            ->get();

        // Define custom headings if needed
            $customHeadings = [
            'اسم الصرف',
            'سعر الصرف',
            'التفاصيل',
            'مصروف بواسطه',
            'التاريخ'
        ];


             return Excel::download(new ReportExport($data,$customHeadings), 'Expenses.xlsx');
    



        }elseif($reportType === 'income'){

            $data = DB::table('ticket')
            ->join('clinic', 'ticket.clinics', '=', 'clinic.id')
            ->join('client', 'ticket.client_id', '=', 'client.id')
            ->join('doctors', 'ticket.doctors', '=', 'doctors.id')
            ->join('services', 'ticket.services', '=', 'services.id')
            ->whereBetween('ticket.created_at', [$startDate, $endDate])
            ->select([
                'client.name as إسم العميل ' ,
                'client.phone as هاتف العميل ' ,
                'doctors.name as إسم الطبيب ' ,
                'clinic.name as عياده ' ,
                'services.name as خدمه ',
                'ticket.fees as السعر ',
                'ticket.paid_method as نوع الدفع',
                'ticket.ticket_status as حالة التذكره',
                'ticket.appointment_datetime as التاريخ'

            ])
            ->get();

        // Define custom headings if needed
            $customHeadings = [
            'إسم العميل',
            'هاتف العميل',
            'إسم الطبيب',
            'عياده',
            'خدمه',
            'السعر',
            'نوع الدفع',
            'حالة التذكره',
            'التاريخ'
        ];


             // Use Laravel-Excel to export the data
             return Excel::download(new ReportExport($data,$customHeadings), 'Income.xlsx');


        }


        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
